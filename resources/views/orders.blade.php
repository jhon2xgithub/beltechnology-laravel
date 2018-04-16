@extends('layouts.main')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage orders</h1>
        <div id="here"></div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" id="new-order" data-target=".new-order">New Order</button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="orders" class="display table table-striped table-sm orders" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Order Reference Number</th>
                    <th>Client</th>

                    <th>Status</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Order Reference Number</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
            	<?php
            	$array_clients = [];
            	foreach ($client_names as $k => $client_name)
            	{
            	    $array_clients['client_names'][$k] = $client_name;
            	}

            	foreach ($client_ids as $k => $client_id)
            	{
            	    $array_clients['client_ids'][$k] = $client_id;
            	}
            	$exclusivity_status = [0 => 'No', 1 => 'Yes'];
            	?>
            	@if(count($orders) > 0) @foreach($orders as $list)
            	<?php
            		$r = explode('/', $list->order_reference_number);
            	$refnum = implode('-', $r);
            	?>

				<tr>
				    <td><a style="color:#333; text-decoration: underline;" href='{{url("/oread/{$list->client_id}/{$refnum}")}}'>{{$list->order_reference_number}}</a></td>
				    <td><a style="color:#333; text-decoration: underline;" href='{{url("/oread/{$list->client_id}/{$refnum}")}}'>{{$list->order_clients}}</a></td>
				    <td>
				        <?php $data = explode(',', $list->order_status); ?>
				        @foreach (explode(',', $list->order_status) as $key => $value)
				            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-orderlist="{{json_encode($orders)}}" id="{{$list->id}}" data-toggle="modal" data-target=".{{strtolower(str_replace(' ', '-',$data[$key]))}}">{{$value}}
							</a>
				            <br/> 
				        @endforeach
				    </td>
				    <td>
				        <a class="btn btn-info btn-sm custom_" href='{{url("/oread/{$list->client_id}/{$refnum}")}}'>
				            <span data-feather="eye-off"></span> view
				        </a>
				    </td>
				    <td id="delete_order_row">
				        <a class="btn btn-danger btn-sm custom_" id="{{$list->id}}" href='{{url("/odelete/{$list->id}")}}' data-refno="{{$list->order_reference_number}}">
				            <span data-feather="delete"></span> delete
				        </a>
				    </td>
				</tr>
				@endforeach @endif
            </tbody>
        </table>
    </div>
</main>
</div>
</div>
<!-- one  -->
<div class="modal fade new-order" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
        <form method="post" action="{{url('ostore')}}" id="1" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="row_num" />
            <input type="hidden" name="column_index" />
            <div class="modal-content">
                <div class="alert alert-danger form-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Order </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>INFORMATION INPUT</span></div>
                                <div class="mb-3">
                                    <label for="client">Client</label>
                                    <select class="selectpicker form-control client" id="client" name="company_name" data-container="body" data-live-search="true" title="Search client by name" data-hide-disabled="true"></select>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Order number from Client</label>
                                    <input type="text" class="form-control" id="order_number_from_client" name="order_number_from_client">
                                </div>
                                <div class="mb-3">
                                    <label for="supplier">Supplier</label>
                                    <select class="selectpicker form-control" id="orderSuppier" name="order_supplier" data-container="body" data-live-search="true" title="Search supplier by name" data-hide-disabled="true"></select>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Order number from Supplier</label>
                                    <input type="text" class="form-control" id="order_number_from_supplier" name="order_number_from_supplier">
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Transport Company</label>

                                    <input type="text" class="form-control" id="transport_company" name="transport_company">
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Transport price</label>

                                    <textarea class="form-control" rows="5" name="transport_price" id="transport_price"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Delivery Time</label>

                                    <textarea class="form-control" rows="5" name="delivery_time" id="delivery_time"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" name="upload_quotation_received" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Upload quotation received</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>ORDER DETAIL</span></div>
                                <div class="mb-3">
                                    <label for="orderCommissionRate">Subject</label>
                                    <input type="text" class="form-control" id="orderCommissionRate" name="order_subject" placeholder="">
                                    <div class="invalid-feedback">
                                        Please enter a Commission rate.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Details</label>

                                    <textarea class="form-control" rows="5" name="order_details" id="order_details"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="orderProduct">Technical Details</label>

                                    <textarea class="form-control" rows="5" name="order_technicaldetails" id="order_technicaldetails"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <!-- <input type="submit" class="btn btn-primary btn-submit" id="lstore-submit" name="submit" value="Add" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- TWO, THREE -->
<div class="modal fade quote-received quote-request" id="modal quote-received" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="" id="23" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="row_num" />
            <input type="hidden" name="column_index" />
            <div class="modal-content">
                <div class="alert alert-danger form-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>ORDER DETAIL</span></div>
                                <div class="table-responsive-md">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Supplier</th>
                                                <td>
                                                    <select class="custom-select d-block w-100" id="orderSuppier" name="order_supplier">
                                                        <option value="">Choose...</option>
                                                        @if(count($suppliers) > 0) @foreach($suppliers as $k=> $supplier)
                                                        <option value="{{$supplier}}">{{$supplier}}</option>
                                                        @endforeach @endif
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Client</th>
                                                <td>
                                                    <select class="custom-select d-block w-100" id="client" name="company_name">
                                                        <option value="">Choose...</option>
                                                        @for ($i=0; $i
                                                        < count($client_names) ; $i++) <option value="{{$client_names[$i]}}">{{$client_names[$i]}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a class="btn btn-success btn-md" id="gqr"><span class="glyphicon glyphicon-edit"></span>GENERATE QUOTATION REQUEST</a>
                                </div>
                                <div class="mb-3">
                                    <label for="">File input</label>
                                    <input type="file" name="upload_recieved_quotation" class="form-control-file" id="upload_recieved_quotation">
                                    <small id="fileHelp" class="form-text text-muted">Upload recieved quotation</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="quotation-recieved-btn-close">Close</button>
                    <!-- <input type="submit" class="btn btn-primary btn-submit" id="lstore-submit form-btn" name="submit" value="Add" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ORDER DETAILS -->
<div class="modal fade order-details" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="{{url('ostore')}}" id="order-details" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="row_num" />
            <input type="hidden" name="column_index" />
            <div class="modal-content">
                <div class="alert alert-danger form-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ORDER DETAILS</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>INFORMATION INPUT</span></div>
                                <input type="hidden" id="orderid" name="id" />
                                <div class="mb-3">
                                    <label for="client">Client</label>
                                    <select class="selectpicker form-control client-order-details" id="client-order-details" name="company_name" data-container="body" data-live-search="true" title="Search client by name" data-hide-disabled="true"></select>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Order number from Client</label>
                                    <input type="text" class="form-control" id="order_number_from_client" name="order_number_from_client">
                                </div>
                                <div class="mb-3">
                                    <label for="supplier">Supplier</label>
                                    <select class="selectpicker form-control" id="orderSuppierdetails" name="order_supplier" data-container="body" data-live-search="true" title="Search supplier by name" data-hide-disabled="true"></select>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Order number from Supplier</label>
                                    <input type="text" class="form-control" id="order_number_from_supplier" name="order_number_from_supplier">
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Transport Company</label>

                                    <input type="text" class="form-control" id="transport_company" name="transport_company">
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Transport price</label>

                                    <textarea class="form-control" rows="5" name="transport_price" id="transport_price_orderdetails"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Delivery Time</label>

                                    <textarea class="form-control" rows="5" name="delivery_time" id="delivery_time"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" name="upload_quotation_received" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Upload quotation received</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>ORDER DETAIL</span></div>
                                <div class="mb-3">
                                    <label for="order_subject">Subject</label>
                                    <input type="text" class="form-control" id="order_subject" name="order_subject" placeholder="">
                                    <div class="invalid-feedback">
                                        Please enter a Commission rate.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Details</label>

                                    <textarea class="form-control" rows="5" name="order_details" id="order_details"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>
                                <div class="input_fields_wrap_products">
                                    <!-- append dynamic form here -->
                                    <div id="foo">
                                        <div class="add-row" style="background: #eee; margin-bottom:5px;">
                                            <button type="button" class="close_ remove_field_" aria-label="Close" style="padding: 0; background-color: transparent; border: 0;-webkit-appearance: none; float: right; font-size: 1.5rem; font-weight: 700; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; opacity: .5;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="ban">Product</label>
                                                    <input type="text" class="form-control" data-error="order_product.0" id="order_product" name="order_product[]">
                                                    <div class="invalid-feedback">
                                                        Name on card is required
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="vn">Price / Piece</label>
                                                    <input type="text" class="form-control order_price" data-error="order_price.0" id="" name="order_price[]">
                                                    <div class="invalid-feedback">
                                                        Please enter your Vat Number address.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="ban">Amount</label>
                                                    <input type="text" class="form-control order_amount" data-error="order_amount.0" id="order_amount" name="order_amount[]">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="vn">Material</label>
                                                    <input type="text" class="form-control" data-error="order_material.0" id="order_material" name="order_material[]">
                                                    <div class="invalid-feedback">
                                                        Please select Suppier
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="ban">Dimensions/Weight</label>
                                                    <input type="text" class="form-control" data-error="order_dimensionweight.0" id="order_dimensionweight" name="order_dimensionweight[]">
                                                </div>
                                            </div>
                                            <input type="hidden" name="ValoreTotale" value="0.00" class="somma">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <button class="add_field_button btn btn-primary btn-submit">Add Product</button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="orderProduct">Technical Details</label>

                                    <textarea class="form-control" rows="5" name="order_technicaldetails" id="order_technicaldetails"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="ban">Total price ( Excl.transport and VAT</label>
                                        <input type="text" class="form-control" id="amount" name="order_totalprice">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <!-- <input type="submit" class="btn btn-primary btn-submit" id="lstore-submit" name="submit" value="Add" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FOUR, FIVE -->
<div class="modal fade quote-sent quote-sup-received" id="modal quote-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="" id="45" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="row_num" />
            <input type="hidden" name="column_index" />
            <input type="hidden" class="form-control" id="orderSupplier" name="order_supplier" placeholder="">
            <div class="modal-content">
                <div class="alert alert-danger form-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>ORDER DETAIL (CONSOLIDATE FROM SUPPLIER)</span></div>
                                <div class="mb-3">
                                    <input type="hidden" name="order_price" id="order_price" />
                                    <label for="orderProduct">Product</label>

                                    <textarea class="form-control" rows="5" name="order_product" id="orderProduct"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="orderAmount">Amount</label>

                                    <textarea class="form-control" rows="5" name="order_amount" id="orderAmount"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a Amount.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <a class="btn btn-success btn-md" id="gq"><span class="glyphicon glyphicon-edit"></span>GENERATE QUOTATION</a>

                                    <small id="fileHelp" class="form-text text-muted">(PLEASE NOTE:  PDF ADAPTABLE for not standard options (like a word document))</small>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" name="upload_client_confirmation" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Upload client confirmation</small>
                                </div>
                                <div class="mb-3">
                                    <a href="#" class="btn btn-warning btn-md custom_"><span class="glyphicon glyphicon-edit"></span>LOST</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-divider mb40"><span>QUOTATION DETAIL</span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary btn-submit" id="lstore-submit" name="submit" value="Add" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- SIX, SEVEN, EIGHT -->
<div class="modal fade quote-acceptance send-confirmation-to-supplier upload-confirmation-supplier-doc" id="modal quote-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="" id="678" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="row_num" />
            <input type="hidden" name="column_index" />
            <div class="modal-content">
                <div class="alert alert-danger form-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>
                                <div class="mb-3">
                                    <label for="orderSuppier">Supplier</label>
                                    <select class="custom-select d-block w-100" id="orderSuppier" name="order_supplier">
                                        <option value="">Choose...</option>
                                        @if(count($suppliers) > 0) @foreach($suppliers as $supplier)
                                        <option value="{{$supplier}}">{{$supplier}}</option>
                                        @endforeach @endif
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select Suppier.
                                    </div>
                                </div>
                                <div class="mb-3">

                                    <label for="orderProduct">Product</label>
                                    <textarea class="form-control" rows="5" name="order_product" id="orderProduct"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter Product.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="orderAmount">Amount</label>
                                    <textarea class="form-control" rows="5" name="order_amount" id="orderAmount"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a Amount.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a class="btn btn-success btn-md" id="gsc"><span class="glyphicon glyphicon-edit"></span>GENERATE SUPPLIER CONFIRMATION</a>

                                </div>
                                <div class="mb-3">
                                    <small id="fileHelp" class="form-text text-muted">(Can be standard message with recieved quotation under step 2 in copy, e.g. I accept your offer as referenced in the below  quotation)</small>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" name="upload_confirmation_supplier_doc" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">UPLOAD SIGNED ORDER CONFIRMATION</small>
                                </div>
                                <div class="mb-3">
                                    <a class="btn btn-success btn-md" id="gcc"><span class="glyphicon glyphicon-edit"></span>GENERATE CLIENT CONFIRMATION</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary btn-submit upload_confirmation_supplier_doc-btn" id="lstore-submit" name="submit" value="Add" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- NINE, TEN, ELEVEN, TWELVE, Thirteen-->
<div class="modal fade generate-supplier-confirmation generate-confirmation-to-client-doc goods-received goods-sent-sup good-received-sup_" id="modal quote-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="" id="9101112_" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="row_num" />
            <input type="hidden" name="column_index" />
            <input type="hidden" id="checkListId" name="id" />
            
            <input type="hidden" id="has_exclusivity" name="has_exclusivity" />

            <div class="modal-content">
                <div class="alert alert-danger form-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <small id="fileHelp" class="form-text text-muted">(if applicable, non-exclusivity)</small>
                                </div>
                                <div class="mb-3">
                                    <label for="upload_delivery_document">File input</label>
                                    <input type="file" name="upload_delivery_document" class="form-control-file" id="upload_delivery_document" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">UPLOAD DELIVERY DOCUMENT</small>
                                </div>
                                <div class="">
                                    <a class="btn btn-success btn-md custom_" id="gdd"><span class="glyphicon glyphicon-edit"></span>GENERATE DELIVERY DOCUMENT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary btn-submit upload_delivery_document_btn" id="lstore-submit" name="submit" value="Add" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- 14, 15-->
<div class="modal fade good-received-sup goods-sent invoice-received invoice-sent" id="modal quote-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="" id="131415" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="row_num" />
            <input type="hidden" name="column_num" />
            <div class="modal-content">
                <div class="alert alert-danger form-error-msg" style="display:none;">
                    <ul></ul>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-4">&nbsp;</div>
                            <div class="col-md-4">
                                <div class="mb-3 upload_delivery_document">
                                    <label for="upload_delivery_document">File input</label>
                                    <input type="file" name="upload_delivery_document" class="form-control-file" id="upload_delivery_document" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE</small>
                                </div>
                                <div class="mb-3">
                                    <a href="#" class="btn btn-success btn-md custom" id="gi"><span class="glyphicon glyphicon-edit"></span>GENERATE INVOICE</a>
                                </div>
                                <div class="mb-3">
                                    <small id="fileHelp" class="form-text text-muted">(all the information should be in the system + PDF ADAPTABLE for not standard options (like a word document))</small>
                                </div>
                            </div>
                            <div class="col-md-4">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary btn-submit upload_delivery_document-btn" id="lstore-submit" name="submit" value="FINAL" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    // close child popup window when parent close
    window.onbeforeunload = function() {
        popupWindow.close();
    };
</script>
@endsection