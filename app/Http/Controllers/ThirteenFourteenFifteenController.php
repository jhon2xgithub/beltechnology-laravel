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

use PDF;

class ThirteenFourteenFifteenController extends Controller
{
    //
    
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadSupplierInvoice(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'upload_delivery_document' => 'required'
        ]);

        if ($validator->passes())
        {

            if ($request->hasFile('upload_delivery_document'))
            {
                $fileName = $id .'-upload-'. $request->file('upload_delivery_document')->getClientOriginalName();
                $data['upload_delivery_document'] = $fileName;

                $request->file('upload_delivery_document')->move(storage_path() . '/supplier/'.$id, $fileName);
            }

            $data['order_status'] = 'INVOICE SENT';
            $update = Orders::where('id', $id)->update($data);

            if ($update)
            {
                $err['response'] = 'Upload delivery document from supplier.';
            }

            Orders::where('id', $id)->update($data);
            echo response()->json(['success' => true]);
        }

        return response()
            ->json(['error' => $validator->errors()
            ->toArray() ]);

    }

    public function postGenerateInvoice(Request $request)
    {

        $id         = $request->input('id');
        $name       = $request->input('name');
        $email      = $request->input('email');
        $subject    = $request->input('subject');
        $message    = $request->input('message');

        $validator = Validator::make($request->all(), [
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
                           'mime'   => 'application/msword','application/pdf','image/png','image/jpeg','application/vnd.openxlformats-officedocument.wordprocessingml.document'  
                       ];           
                    } 
                    // $attachments is an array with file paths of attachments
                    foreach($attachments as $filePath => $fileParameters){
                        $message->attach($filePath, $fileParameters);
                    }
                });

                $data['generate_quote'] = 'storage/client/'.$id.'/' . implode(',',$data['attachment']);
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
                    unset($data['email']);
                    unset($data['subject']);
                    unset($data['attachment']);
                    unset($data['content']);
                    $data['order_status'] = 'INVOICE PAID';
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

}

