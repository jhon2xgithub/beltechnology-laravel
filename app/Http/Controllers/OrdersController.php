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

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('klantens')->join('orders', 'klantens.id', '=', 'orders.client_id')
            ->select('orders.*', 'klantens.id as klantens_client_id', 'klantens.company_name as company_name', 'klantens.contact_person_last_name as contact_lastname')
        // ->where('klantens.id', $id)
        
            ->get();

        $klantens = DB::table('klantens')->select('*')
            ->get();

        // client
        $klantens_ids_array = [];
        foreach ($klantens as $key => $klanten)
        {
            $klantens_ids_array[] = $klanten->id;
        }

        $klantens_names_array = [];
        foreach ($klantens as $key => $klanten)
        {

            $klantens_names_array[] = $klanten->company_name;
        }

        // supplier
        $leveranciers = DB::table('leveranciers')->select('supplier_name')
            ->get();

        $leverancier_array = [];
        foreach ($leveranciers as $key => $leverancier)
        {
            $leverancier_array[] = $leverancier->supplier_name;
        }

        return view('orders', ['orders' => $orders, 'client_ids' => $klantens_ids_array, 'client_names' => $klantens_names_array, 'suppliers' => $leverancier_array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->input('company_name');
        $klantens = DB::table('klantens')->select('id', 'company_name')
            ->where('id', $id)->get();
        $orders = DB::table('orders')->select('client_id')
            ->where('client_id', $id)->get();

        if (count($klantens) > 0 && !empty($klantens))
        {
            $id = $klantens[0]->id;
            $company_name = $klantens[0]->company_name;

            // start generating order reference number
            $first = str_pad(substr($id, 0, 2) , 3, ".");
            $second = substr($id, 2);
            $id = $first . $second;
            $orderTimes = count($orders);

            if ($orderTimes == 1)
            {
                $numOrder = $orderTimes + 1;
                $leading = (strlen($numOrder) == 1) ? 0 : '';

                $order_reference_number = 'PvB/' . $id . '/' . substr(date("Y") , 2) . $leading . $numOrder;
            }
            elseif ($orderTimes > 0)
            {

                $numOrder = $orderTimes + 1;
                $leading = (strlen($numOrder) == 1) ? 0 : '';
                $order_reference_number = 'PvB/' . $id . '/' . substr(date("Y") , 2) . $leading . $numOrder;

            }
            else
            {

                $leading = 0;
                $numOrder = $orderTimes + 1;
                $order_reference_number = 'PvB/' . $id . '/' . substr(date("Y") , 2) . $leading . $numOrder;
            }
        }

        $validator = Validator::make($request->all() , [
            'company_name'                  => 'required', 
            'order_supplier'                => 'required', 
            'transport_company'             => 'required', 
            'delivery_time'                 => 'required', 
            'upload_quotation_received'     => 'required'
        ]);

        if ($validator->passes())
        {

            $orders = new Orders;

            if ($request->hasFile('upload_quotation_received'))
            {

                $fileName = $klantens[0]->id. '-upload-' .$request->file('upload_quotation_received')
                    ->getClientOriginalName();

                $data['upload_quotation_received'] = $fileName;
                $request->file('upload_quotation_received')
                    ->move(storage_path() . "/client/{$klantens[0]->id}", $fileName);

                $orders->order_reference_number     = $order_reference_number;
                $orders->order_clients              = $klantens[0]->company_name;
                $orders->client_id                  = $klantens[0]->id;
                $orders->order_number_from_client   = $request->input('order_number_from_client');
                $orders->order_supplier             = $request->input('order_supplier');          

                $orders->order_number_from_supplier = $request->input('order_number_from_supplier');
                $orders->transport_company          = $request->input('transport_company');
                $orders->transport_price            = $request->input('transport_price') ? $request->input('transport_price') : '';
                $orders->delivery_time              = $request->input('delivery_time') ? $request->input('delivery_time') : '';
                $orders->order_status               = 'QUOTE RECEIVED';
                $orders->upload_quotation_received  = "storage/client/{$klantens[0]->id}/" . $fileName;

                $orders->order_subject              = $request->input('order_subject');
                $orders->order_details              = $request->input('order_details');
                $orders->order_technicaldetails     = $request->input('order_technicaldetails');

                $orders->order_qty                  = 1;
                $orders->order_exclusivity_status   = $request->input('order_exclusivity_status') == 'Yes' ? 1 : 0;
                $orders->save();
              
                echo response()->json(['success' => true]);

            }

        }

        return response()
            ->json(['error' => $validator->errors()
            ->toArray() ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $refnumber)
    {
        $ref = explode('-', $refnumber);
        $refnumber = implode('/', $ref);

        $orders = DB::table('klantens')->join('orders', 'klantens.id', '=', 'orders.client_id')
            ->where('klantens.id', $id)->where('orders.order_reference_number', $refnumber)->get();

        $leveranciers = DB::table('leveranciers')->where('leveranciers.supplier_name', $orders[0]->order_supplier)
            ->get();
        return view('orders_view', compact('orders', 'leveranciers'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Orders::where('id', $id)->delete();
        return redirect()
            ->back()
            ->with('message', 'order id: ' . $id . ' has been deleted');
    }


    public function inlineedit(Request $request, $id){

        $column_name = $request->input('name');
        $column_value = $request->input('value');

        if( $request->has('name') && $request->has('name')) {
            Orders::select()
            ->where('id', '=', $id)
            ->update([$column_name => $column_value]);
            return response()->json([ 'code'=>200], 200);
        }

        return response()->json([ 'error'=> 400, 'message'=> 'Not enought params' ], 400);

    }

    /* Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function quoteinfo($id)
    {

        $orders = DB::table('orders')
        // ->join('orders', 'klantens.id', '=', 'orders.client_id')
        ->where('id', $id)
        ->get();

        return response()->json($orders);
    }


}

