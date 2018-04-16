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

class StatusFourFiveController extends Controller
{
    public function editRequestQuotationLetter(Request $request)
    {
        return view('quotation.fourFive.pdf.edit-request-quotation-letter');
    }

    public function generateQuotationRequest(Request $request, $id, $client_id)
    {
        $client = DB::table('klantens')->select('*')->where('id', $client_id)->get();
        $order  = DB::table('orders')->select('*')->where('client_id', $client_id)->get();

        $data['order_id']       = $id;
        $data['client_id']      = $client_id;
        $data['company_name']   = $client[0]->company_name;
        $data['company_email']  = $client[0]->company_email;

        // echo '<pre>';

        // print_r($client); 
        
        return view('quotation.fourFive.generate-quotation-request', compact('data', 'client', 'order'));
    }

    public function postGenerateQuotationRequest(Request $request)
    {

        $id         = $request->input('id');
        $name       = $request->input('name');
        $subject    = $request->input('subject');
        $email      = $request->input('email');
        $subject    = $request->input('subject');
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
            $data['email']      = $email;
            $data['subject']    = $subject;
            $data['content']    = $message;

            $err = []; 
            if ($request->hasFile('attachment')) // checks if file attach is uploaded
            {
           
                $destinationPath = storage_path() . "/supplier/{$id}";  // set the path for uploaded file
                $files = $request->file('attachment'); // will get all files
                
                foreach ($files as $file) { //this statement will loop through all files.
                    $file_name = $file->getClientOriginalName(); //Get file original name
                    $file->move($destinationPath , $file_name); // move files to destination folder
                    $data['attachment'][] =  $file_name;
                }

                Mail::send('quotation.fourFive.email.html-format', $data, function ($message) use ($data)
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from($_ENV['MAIL_USERNAME']);
                    
                    $destinationPath = storage_path() . "/supplier/{$data['id']}"; 
                    foreach ($data['attachment'] as $key => $value) { // create multiple files to upload
                        $attachments[$destinationPath.'/'.$value ] = [
                           'as'     =>  $value,
                           'mime'   => 'application/pdf',
                       ];           
                    } 
                    // $attachments is an array with file paths of attachments
                    foreach($attachments as $filePath => $fileParameters){
                        $message->attach($filePath, $fileParameters);
                    }
                });

                $data['generate_quote'] = 'storage/client/'.$id.'/' . implode(',',$data['attachment']);
                
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
                    unset($data['subject']);
                    unset($data['attachment']);
                    unset($data['content']);
           
                    $data['order_status'] = 'QUOTE SENT';
                    
                    $update = Orders::where('id', $id)->update($data);

                    if ($update)
                    {
                        $err['response'] = 'Quotation sent to client. ';
                    }
                }
                echo response()->json(['success' => true]);
            }
        }

        return response()
            ->json(['error' => $validator->errors()
            ->toArray() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quotedacceptancesent(Request $request, $id)
    {

        $validator = Validator::make($request->all() , [
            'order_product'                 => 'required', 
            'order_amount'                  => 'required', 
            'upload_client_confirmation'    => 'required'
        ]);

        if ($validator->passes())
        {

            $data = [
                'order_supplier'    => $request->input('order_supplier'), 
                'order_product'     => $request->input('order_product'), 
                'order_amount'      => $request->input('order_amount') 
            ];

            // upload_client_confirmation
            if ($request->hasFile('upload_client_confirmation'))
            {
                $fileName = $id .'-upload-'. $request->file('upload_client_confirmation')->getClientOriginalName();

                $data['upload_client_confirmation'] = $fileName;

                $request->file('upload_client_confirmation')->move(storage_path() . '/client/'.$id, $fileName);
            }

            if (isset($data['upload_client_confirmation']))
            {
                $data['upload_client_confirmation'] = "storage/client/".$id."/" . $data['upload_client_confirmation'];
                $data['order_status']               = 'QUOTE ACCEPTANCE';
                $err['response']                    = true;
            }   
            else
            {

                $err['response'] = true;
            }

            DB::table('orders')->where("id", $id)->update($data);

            echo response()->json(['success' => $err]);

        }
        return response()->json(['error' => $validator->errors()
            ->toArray() ]);

    }

}

