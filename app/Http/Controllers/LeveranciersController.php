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

class LeveranciersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $leveranciers = leveranciers::All();
        $leveranciers = DB::table('leveranciers')->orderBy('id', 'desc')
            ->get();

        return view('leveranciers', ['leveranciers' => $leveranciers]);
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

        $validator = Validator::make($request->all() , [
            'supplier_name'                 => 'required', 
            'supplier_street'               => 'required', 
            'supplier_number'               => 'required|regex:/^[a-zA-Z0-9]+$/u', 
            'supplier_country'              => 'required', 
            'supplier_city'                 => 'required', 
            'supplier_zip'                  => 'required', 
            'supplier_email'                => 'required|email', 
            'supplier_telephone'            => 'required', 
            'supplier_exclusivity_status'   => 'required'
        ]);

        if ($validator->passes())
        {

            $leveranciers = new Leveranciers;

            // $leveranciers->fill($request->all());
            $leveranciers->supplier_name                = $request->input('supplier_name');
            $leveranciers->supplier_street              = $request->input('supplier_street')? $request->input('supplier_street'):'';
            $leveranciers->supplier_number              = $request->input('supplier_number');
            $leveranciers->supplier_country             = $request->input('supplier_country'); 
            $leveranciers->supplier_city                = $request->input('supplier_city');
            $leveranciers->supplier_zip                 = $request->input('supplier_zip');
            $leveranciers->ban                          = $request->input('ban')? $request->input('ban'):'';
            $leveranciers->vn                           = $request->input('vn')? $request->input('vn'):'';
            $leveranciers->supplier_email               = $request->input('supplier_email'); 
            $leveranciers->supplier_telephone           = $request->input('supplier_telephone'); 
            $leveranciers->supplier_exclusivity_status  = $request->input('supplier_exclusivity_status');
            $leveranciers->supplier_general_fax         = $request->input('supplier_general_fax')? $request->input('supplier_general_fax'):'';
            $leveranciers->supplier_sector              = $request->input('supplier_sector')? $request->input('supplier_sector'):'';
            $leveranciers->contact_first_name           = $request->input('contact_first_name')? $request->input('contact_first_name'):''; 
            $leveranciers->contact_lastname             = $request->input('contact_lastname')? $request->input('contact_lastname'):'';
            $leveranciers->contact_email                = $request->input('contact_email')? $request->input('contact_email'):'';
            $leveranciers->contact_telephone            = $request->input('contact_telephone')? $request->input('contact_telephone'):''; 
            $leveranciers->contact_function             = $request->input('contact_function')? $request->input('contact_function'):'';
            $leveranciers->contact_person_last_name     = $request->input('contact_person_last_name.*') ? implode(',', $request->input('contact_person_last_name.*')) : '';
            $leveranciers->contact_person_first_name    = $request->input('contact_person_first_name.*') ? implode(',', $request->input('contact_person_first_name.*')) : '';
            $leveranciers->contact_person_function      = $request->input('contact_person_function.*') ? implode(',', $request->input('contact_person_function.*')) : '';
            $leveranciers->contact_person_email         = $request->input('contact_person_email.*') ? implode(',', $request->input('contact_person_email.*')) : '';
            $leveranciers->contact_person_telephone     = $request->input('contact_person_telephone.*') ? implode(',', $request->input('contact_person_telephone.*')) : '';
        
            $leveranciers->save();

            return response()
                ->json(['success' => 'Added new records.']);
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
    public function show($id)
    {

        $leveranciers = Leveranciers::find($id);

        $related_orders = Orders::leftJoin('leveranciers', 'orders.order_supplier', 'leveranciers.supplier_name')->where('orders.order_supplier', $leveranciers->supplier_name)
            ->select('client_id', 'order_reference_number', 'order_clients', 'order_supplier', 'order_status', 'orders.updated_at')
        // ->select('*')
        // ->sum(\DB::raw('(orders.order_amount) * (orders.order_qty)'));
        
            ->get();

        if (count($related_orders) > 0)
        {
            $klantens = DB::table('klantens')->where('klantens.id', $related_orders[0]->client_id)
                ->get();

            return view('leveranciers_view', compact('leveranciers', 'related_orders', 'klantens'));
        }
        else
        {
            return view('leveranciers_view', compact('leveranciers', 'related_orders'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leveranciers = Leveranciers::find($id);

        $related_orders = Orders::leftJoin('leveranciers', 'orders.order_supplier', 'leveranciers.supplier_name')->where('orders.order_supplier', $leveranciers->supplier_name)
            ->select('order_exclusivity_status', 'order_supplier', 'order_reference_number')
        // ->select('*')
        // ->sum(\DB::raw('(orders.order_amount) * (orders.order_qty)'));
        
            ->get();

        if (count($related_orders) > 0)
        {
            return view('leveranciers_edit', ['leveranciers' => $leveranciers, 'order_exclusivity_status' => $related_orders[0]->order_exclusivity_status]);
        }
        else
        {
            return view('leveranciers_edit', ['leveranciers' => $leveranciers]);
        }

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

        $id = $request->input('id');

        $validator = Validator::make($request->all() , [
            'supplier_name'                 => 'required', 
            'supplier_number'               => 'required|regex:/^[a-zA-Z0-9]+$/u', 
            'supplier_country'              => 'required', 
            'supplier_city'                 => 'required', 
            'supplier_zip'                  => 'required', 
            'ban'                           => 'required', 
            'vn'                            => 'required', 
            'supplier_email'                => 'required|email', 
            'supplier_telephone'            => 'required', 
            'supplier_general_fax'          => 'required', 
            'supplier_rate'                 => 'required', 
            'supplier_sector'               => 'required', 
            'supplier_exclusivity_status'   => 'required'
        ]);

        if ($validator->passes())
        {

            // foreach ($request->all() as $key => $value)
            // {
            //     if ($key != '_token')
            //     {
            //         $data[$key] = $value;
            //     }              
            // }


            $data['supplier_name']                  = $request->input('supplier_name');
            $data['supplier_street']                = $request->input('supplier_street')? $request->input('supplier_street'):'';
            $data['supplier_number']                = $request->input('supplier_number');
            $data['supplier_country']               = $request->input('supplier_country'); 
            $data['supplier_city']                  = $request->input('supplier_city');
            $data['supplier_zip']                   = $request->input('supplier_zip');
            $data['ban']                            = $request->input('ban');
            $data['vn']                             = $request->input('vn');
            $data['supplier_email']                 = $request->input('supplier_email'); 
            $data['supplier_telephone']             = $request->input('supplier_telephone'); 
            $data['supplier_general_fax']           = $request->input('supplier_general_fax')? $request->input('supplier_general_fax'):'';
            $data['supplier_rate']                  = $request->input('supplier_rate'); 
            $data['supplier_sector']                = $request->input('supplier_sector')? $request->input('supplier_sector'):'';
            $data['supplier_exclusivity_status']    = $request->input('supplier_exclusivity_status'); 
            $data['contact_first_name']             = $request->input('contact_first_name')? $request->input('contact_first_name'):''; 
            $data['contact_lastname']               = $request->input('contact_lastname')? $request->input('contact_lastname'):'';
            $data['contact_email']                  = $request->input('contact_email')? $request->input('contact_email'):'';
            $data['contact_telephone']              = $request->input('contact_telephone')? $request->input('contact_telephone'):''; 
            $data['contact_function']               = $request->input('contact_function')? $request->input('contact_function'):'';

            // if($key = 'contact_person_first_name'){
                $data['contact_person_first_name']  = $request->input('contact_person_first_name')? implode(',', $request->input('contact_person_first_name.*')):'';
            // }

            // if($key = 'contact_person_last_name'){
                $data['contact_person_last_name']   = $request->input('contact_person_last_name')? implode(',', $request->input('contact_person_last_name.*')):'';
            // }

            // if($key = 'contact_person_email'){
                $data['contact_person_email']       = $request->input('contact_person_email')? implode(',', $request->input('contact_person_email.*')):'';
            // }

            // if($key = 'contact_person_telephone'){
                $data['contact_person_telephone']   = $request->input('contact_person_telephone')? implode(',', $request->input('contact_person_telephone.*')):'';
            // }

            // if($key = 'contact_person_function'){
                $data['contact_person_function']    = $request->input('contact_person_function')? implode(',', $request->input('contact_person_function.*')):'';
            // }

            Leveranciers::where('id', $id)->update($data);
            return redirect()->back()
                ->with('success', 'Record has been updated.');
        }

        return redirect()
            ->back()
            ->withErrors($validator->errors()
            ->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leveranciers::where('id', $id)->delete();
        return redirect('/leveranciers')
            ->with('message', 'supplier id: ' . $id . ' has been deleted');
    }

    public function inlineedit(Request $request, $id)
    {

        $column_name = $request->input('name');
        $column_value = $request->input('value');

        if ($request->has('name') && $request->has('name'))
        {
            Leveranciers::select()
                ->where('id', '=', $id)->update([$column_name => $column_value]);
            return response()->json(['code' => 200], 200);
        }

        return response()
            ->json(['error' => 400, 'message' => 'Not enought params'], 400);

    }
}

