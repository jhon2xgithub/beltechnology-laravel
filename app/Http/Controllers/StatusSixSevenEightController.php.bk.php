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

class StatusSixSevenEightController extends Controller
{
    public function generateSupplierconfirmation(Request $request, $id, $supplier_name)
    {
        $supplier = DB::table('leveranciers')->select('*')->where('supplier_name', $supplier_name)->get();
        $order = DB::table('orders')->select('*')->where('order_supplier', $supplier_name)->where('id', $id)->get();

        $data['order_id'] = $id;
        $data['supplier_name'] = $supplier[0]->supplier_name;
        $data['supplier_email'] = $supplier[0]->supplier_email;

        $client = DB::table('klantens')
            ->select('*')
            ->where('id', $order[0]->client_id)
            ->get();


        return view('quotation.sixSevenEight.generate-quotation-request', compact('data', 'supplier', 'order', 'client'));
    }

    public function postGenerateSupplierconfirmation(Request $request)
    {
        $id         = $request->input('id');
        $name       = $request->input('name');
        $subject    = $request->input('subject');
        $email      = $request->input('email');
        $message    = $request->input('message');

        $validator = Validator::make($request->all() , [
            'name'          => 'required', 
            'subject'       => 'required',
            'email'         => 'required', 
            'message'       => 'required', 
            'attachment'    => 'required'
        ]);

        if ($validator->passes())
        {
            $data['id']         = $id;
            $data['name']       = $name;
            $data['subject']    = $subject;
            $data['email']      = $email;
            $data['content']    = $message;

            if ($request->hasFile('attachment'))
            {
                $fileName = $id .'-email-'. $request->file('attachment')
                    ->getClientOriginalName();
                $data['attachment'] = $fileName;
            }

            if ($data['attachment'])
            {

                $request->file('attachment')
                    ->move(storage_path() . '/supplier/'.$id, $data['attachment']);

                Mail::send('quotation.sixSevenEight.email.supplier.html-format', $data, function ($message) use ($data)
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from($_ENV['MAIL_USERNAME']);
                    $message->attach('storage/supplier/'.$data['id'] .'/' . $data['attachment']);
                });

                $data['send_confirmation_to_supplier'] = "storage/supplier/".$data['id'] ."/" . $data['attachment'];
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
                    $data['order_status']   = 'SEND CONFIRMATION TO SUPPLIER';
                    $update                 = Orders::where('id', $id)->update($data);

                    if ($update)
                    {
                        $err['response'] = 'Send confirmation to supplier.';
                    }
                }
                echo response()->json(['success' => $err]);
            }
        }
        return response()->json(['error' => $validator->errors()
            ->toArray() ]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadConfirmationToSupplierDoc(Request $request, $id)
    {

        $validator = Validator::make($request->all() , [
            'order_supplier'                    => 'required', 
            'order_product'                     => 'required', 
            'order_amount'                      => 'required', 
            'upload_confirmation_supplier_doc'  => 'required'
        ]);

        if ($validator->passes())
        {

            $data['order_supplier']     = $request->input('order_supplier');
            $data['order_product']      = $request->input('order_product');
            $data['order_amount']       = $request->input('order_amount');

            if ($request->hasFile('upload_confirmation_supplier_doc'))
            {
                $fileName = $id .'-upload-'. $request->file('upload_confirmation_supplier_doc')
                    ->getClientOriginalName();
                $data['upload_confirmation_supplier_doc'] = $fileName;
                $request->file('upload_confirmation_supplier_doc')->move(storage_path() . '/supplier/'.$id, $fileName);
            }

            if (isset($data['upload_confirmation_supplier_doc']))
            {
                $data['upload_confirmation_supplier_doc']   = "storage/supplier/".$id."/" . $data['upload_confirmation_supplier_doc'];
                $data['order_status']                       = 'UPLOAD CONFIRMATION SUPPLIER DOC';
                $err['response']                            = true;
            }
            else
            {
                $err['response'] = true;
            }

            Orders::where('id', $id)->update($data);
            echo response()->json(['success' => $err]);

        }

        return response()->json(['error' => $validator->errors()
            ->toArray() ]);

    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateConfirmationToClient(Request $request, $id, $client_id)
    {
        $client = DB::table('klantens')->select()
            ->where('id', $client_id)->get();

        $order = DB::table('orders')->select('*')
            ->where('client_id', $client_id)->where('id', $id)->get();

        $data = ['order_id' => $id, 'company_name' => $client[0]->company_name, 'company_email' => $client[0]->company_email, 'company_country' => $client[0]->company_country, ];

        $supplier = DB::table('leveranciers')->select('*')
            ->where('supplier_name', $order[0]->order_supplier)
            ->get();

        return view('quotation.sixSevenEight.generate-confirmation-to-client', compact('client', 'order', 'supplier', 'data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postGenerateConfirmationToClient(Request $request)
    {

        $id         = $request->input('id');
        $name       = $request->input('name');
        $subject    = $request->input('subject');
        $email      = $request->input('email');
        $message    = $request->input('message');

        $validator = Validator::make($request->all() , [
            'name'          => 'required', 
            'subject'       => 'required', 
            'email'         => 'required', 
            'message'       => 'required', 
            'attachment'    => 'required'
        ]);

        if ($validator->passes())
        {
            $data['id']         = $id;
            $data['name']       = $name;
            $data['subject']    = $subject;
            $data['email']      = $email;
            $data['content']    = $message;

            if ($request->hasFile('attachment'))
            {
                $fileName = $id .'-email-'. $request->file('attachment')
                    ->getClientOriginalName();
                $data['attachment'] = $fileName;
            }

            if ($data['attachment'])
            {

                $request->file('attachment')
                    ->move(storage_path() . '/client/'.$id, $data['attachment']);

                Mail::send('quotation.sixSevenEight.email.client.html-format', $data, function ($message) use ($data)
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from($_ENV['MAIL_USERNAME']);
                    $message->attach('storage/client/'.$data['id'].'/' . $data['attachment']);
                });
                $data['generate_confirmation_to_client_doc'] = "storage/client/".$id."/" . $data['attachment'];

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
                    $data['order_status']   = 'GENERATE CONFIRMATION TO CLIENT DOC';
                    $update                 = Orders::where('id', $id)->update($data);

                    if ($update)
                    {
                        $err['response'] = 'Generate confirmation to client doc.';
                    }
                }
                echo response()->json(['success' => $err]);
            }
        }
        return response()->json(['error' => $validator->errors()
            ->toArray() ]);
    }
}

