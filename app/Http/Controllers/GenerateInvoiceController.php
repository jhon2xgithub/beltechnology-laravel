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

class GenerateInvoiceController extends Controller
{
    public function generateInvoice(Request $request, $id)
    {

        $orders = Orders::leftJoin('klantens', 'klantens.id', 'orders.client_id')->where('orders.id', $id)->select('*')
        // ->sum(\DB::raw('(orders.order_amount) * (orders.order_qty)'));
        
            ->first();
        $orid = $orders['client_id'];
        $order_id = DB::table('orders')->select('id')
            ->where('client_id', $orid)->get();

        $sub_total = Orders::where('id', $id)->sum(\DB::raw('(orders.order_amount) * (orders.order_qty)'));

        if ($request->has('download'))
        {
            $pdf = \PDF::loadView('quotation.generateInvoice.pdf.generate-invoice', compact('orders', 'sub_total') , array(
                'pdf' => true
            ));

            return $pdf->download('generate-invoice.pdf');
        }

        $orders['order_id'] = $id;

        // echo '<pre>';
        // print_r($orders);
        // die();
        return view('quotation.generateInvoice.pdf.generate-invoice', compact('orders', 'sub_total', 'order_id') , array(
            'pdf' => false
        ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function goodRecievedSent(Request $request, $id)
    {

        $validator = Validator::make($request->all() , ['upload_delivery_document' => 'required']);

        if ($validator->passes())
        {

            if ($request->hasFile('upload_delivery_document'))
            {

                $fileName = uniqid() . $request->file('upload_delivery_document')
                    ->getClientOriginalName();

                $data['upload_delivery_document'] = $fileName;

                $request->file('upload_delivery_document')
                    ->move(base_path() . '/assets/uploads/upload_delivery_document/attach', $fileName);
            }

            if ($data['upload_delivery_document'])
            {

                $data['order_status'] = 'INVOICE SENT';
            }

            Orders::where('id', $id)->update($data);

            echo response()->json(['success' => true]);

        }

        return response()
            ->json(['error' => $validator->errors()
            ->toArray() ]);

    }

}

