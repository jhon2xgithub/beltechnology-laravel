<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use App\klanten;
use App\Leveranciers;
use App\Http\Controllers\Controller;
use Validator;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Mail;

class StatusTwoThreeController extends Controller
{

    public function generateQuotationRequestForm(Request $request, $id, $supplier_name, $row_num, $column_num)
    {
        $supplier = DB::table('leveranciers')->select('*')->where('supplier_name', $supplier_name)->get();
        $order = DB::table('orders')->select('*')->where('order_supplier', $supplier_name)->where('id', $id)->get();

        $data['order_id'] = $id;
        $data['row_num'] = $row_num;
        $data['column_num'] = $column_num;
        $data['supplier_name'] = $supplier[0]->supplier_name;
        $data['supplier_email'] = $supplier[0]->supplier_email;

        return view('quotation.twoThree.generate-quotation-request', compact('data', 'supplier', 'order'));

    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postGenerateQuotationRequestForm(Request $request)
    {

        $id         = $request->input('id');
        $name       = $request->input('name');
        $subject    = $request->input('subject');
        $email      = $request->input('email');
        $message    = $request->input('message');

        $validator = Validator::make($request->all() , [
            'name'          => 'required', 
            'email'         => 'required', 
            'subject'       => 'required',
            'message'       => 'required', 
            'attachment'    => 'required'
        ]);

        if ($validator->passes())
        {
            $data['id']         = $id;
            $data['name']       = $name;
            $data['subject']    = $name;
            $data['email']      = $email;
            $data['content']    = $message;
       
            if ($request->hasFile('attachment')) // checks if file attach is uploaded
            {
           
                $destinationPath = storage_path() . "/supplier/{$id}";  // set the path for uploaded file
                $files = $request->file('attachment'); // will get all files
                
                foreach ($files as $file) { //this statement will loop through all files.
                    $file_name = $file->getClientOriginalName(); //Get file original name
                    $file->move($destinationPath , $file_name); // move files to destination folder
                    $data['attachment'][] =  $file_name;
                }

                Mail::send('quotation.twoThree.email.html-format', $data, function ($message) use ($data)
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from($_ENV['MAIL_USERNAME']);  

                    $destinationPath = storage_path() . "/supplier/{$data['id']}"; 
                    foreach ($data['attachment'] as $key => $value) { // create multiple files to upload
                        $attachments[$destinationPath.'/'.$value ] = [
                           'as'     =>  $value,
                           'mime'   => 'application/msword','application/pdf','image/png','image/jpeg','application/vnd.openxlformats-officedocument.wordprocessingml.document'  
                       ];           
                    } 
                    // $attachments is an array with file paths of attachments
                    foreach($attachments as $filePath => $fileParameters){
                        $message->attach($filePath, $fileParameters);
                    }
                });

                $data['generate_quotation_request'] = "storage/supplier/{$id}/" . implode(',',$data['attachment']);                
                $err = [];   
                if (count(Mail::failures()) > 0)
                {
                    $err['response'] = "There was one or more failures. They were: <br />";

                    foreach (Mail::failures as $email_address)
                    {
                        $err['response'] = " - $email_address <br />";
                    }
                }
                else
                {
              
                    unset($data['id']);
                    unset($data['name']);
                    unset($data['subject']);
                    unset($data['email']);
                    unset($data['attachment']);
                    unset($data['content']);

                    $data['order_status'] = 'QUOTE REQUEST';

                    $update = Orders::where('id', $id)->update($data);
                    $err['response'] = 'Request for quotaion from suppliers';

                }
                echo response()->json(['success' => $err]);
            }

        }

        return response()->json(['error' => $validator->errors()
            ->toArray() ]);
    }

    /* order details */
    public function orderdetails(Request $request, $id)
    {

        $clientid = $request->input('company_name');
        $klantens = DB::table('klantens')->select('id', 'company_name')
            ->where('id', $clientid)->get();

        $validator = Validator::make($request->all() , [
            'transport_company'         => 'required',
            'delivery_time'             => 'required', 
            'order_subject'             => 'required', 
            'order_details'             => 'required', 
            'order_technicaldetails'    => 'required', 
            'order_product.*'           => 'required', 
            'order_price.*'             => 'required', 
            'order_amount.*'            => 'required', 
            'order_material.*'          => 'required', 
            'order_dimensionweight.*'   => 'required'
        ]);

        if ($validator->passes())
        {

            $data = [
                'order_clients'                 => $klantens[0]->company_name, 
                'order_number_from_client'      => $request->input('order_number_from_client'), 
                'order_supplier'                => $request->input('order_supplier'), 
                'order_number_from_supplier'    => $request->input('order_number_from_supplier'), 
                'transport_company'             => $request->input('transport_company'), 
                'transport_price'               => $request->input('transport_price'), 
                'delivery_time'                 => $request->input('delivery_time'), 
                'order_subject'                 => $request->input('order_subject'), 
                'order_details'                 => $request->input('order_details'), 
                'order_product'                 => implode(',', $request->input('order_product.*')) , 
                'order_price'                   => implode(',', $request->input('order_price.*')) , 
                'order_amount'                  => implode(',', $request->input('order_amount.*')) , 
                'order_material'                => implode(',', $request->input('order_material.*')) , 
                'order_dimensionweight'         => implode(',', $request->input('order_dimensionweight.*')),
                'order_technicaldetails'        => $request->input('order_technicaldetails'), 
                'order_totalprice'              => $request->input('order_totalprice') 
            ];

            $data['order_status'] = 'QUOTE SUP RECEIVED';

            Orders::where('id', $id)->update($data);
            echo response()->json(['success' => 'order detail has been added']);

        }

        return response()
            ->json(['error' => $validator->errors()
            ->toArray() ]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quotedreceived(Request $request, $id)
    {

        $klantens = DB::table('klantens')->select('id')->where('company_name', $id)->get();

        $validator = Validator::make($request->all() , [
            'company_name'              => 'required', 
            'order_supplier'            => 'required',
            'upload_recieved_quotation' => 'required'
        ]);

        if ($validator->passes())
        {

            $data = [
                'order_clients' => $request->input('company_name'), 
                'order_supplier' => $request->input('order_supplier')
            ];

            if ($request->hasFile('upload_recieved_quotation'))
            {
                $fileName =  $id.'-upload-'.$request->file('upload_recieved_quotation')->getClientOriginalName();
                $data['upload_recieved_quotation'] = $fileName;
                $request->file('upload_recieved_quotation')->move(storage_path() . '/supplier/{$id}', $fileName);
            }

            if (isset($data['upload_recieved_quotation']))
            {
                $data['upload_recieved_quotation'] = "storage/supplier/{$id}/" . $data['upload_recieved_quotation'];
                $data['order_status'] = 'ORDER DETAILS';
                $err['response'] = 'Request(s) received from supplier(s)';
            }
            else
            {

                $err['response'] = 'Nothing has changed';
            }

            Orders::where('id', $id)->update($data);
            echo response()->json(['success' => $err]);

        }

        return response()->json(['error' => $validator->errors()
            ->toArray() ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quotedsupreceivedrequest(Request $request, $id)
    {
        $_price = explode(',', $request->input('order_price'));
        $new_price_array = [];
        foreach (explode(',', $request->input('order_amount')) as $key_amount => $_amount)
        {
            $new_price = $_amount * $_price[$key_amount];
            $new_price = ($new_price == 0) ? $_price[$key_amount] : $new_price;
            $new_price_array[] = $new_price;
        }

        $validator = Validator::make($request->all() , ['order_product' => 'required', 'order_amount' => 'required', 'upload_client_confirmation' => 'required']);

        if ($validator->passes())
        {
            $data = ['order_product' => $request->input('order_product') , 'order_price' => implode(',', $new_price_array) , 'order_amount' => $request->input('order_amount') , 'upload_client_confirmation' => $request->input('upload_client_confirmation') ];

            if ($request->hasFile('upload_client_confirmation'))
            {
                $fileName = uniqid() . $request->file('upload_client_confirmation')
                    ->getClientOriginalName();
                $data['upload_client_confirmation'] = $fileName;
                $request->file('upload_client_confirmation')
                    ->move(storage_path() . '/client/quoteacceptance', $fileName);
            }

            if (isset($data['upload_client_confirmation']))
            {
                $data['upload_client_confirmation'] = "client/quoteacceptance/" . $data['upload_client_confirmation'];
                $data['order_status'] = 'QUOTE ACCEPTANCE';
                $err['response'] = true;
            }
            else
            {

                $err['response'] = false;
            }

            Orders::where('id', $id)->update($data);
            echo response()->json(['success' => $err]);

        }

        return response()->json(['error' => $validator->errors()
            ->toArray() ]);

    }

}

