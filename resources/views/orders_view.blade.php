@extends('layouts.main')

@section('content')
<div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Order & Account Information</h1>

    </div>

    <div class="col-md-12">

        <div class="row pb-2 mb-3 border-bottom">

            <div class="col-md-6">

                <table class="table table-bordered_ table-striped table-responsive_" id="example">

                    <tbody>
                        <tr>
                            <th class="text-nowrap" scope="row">Order Date</th>
                            <td>{{$orders[0]->created_at}}</td>

                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Order Status</th>
                            <td>
                                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">{{$orders[0]->order_status}}</a>
                            </td>

                        </tr>
                        <tr>    
                            <th class="text-nowrap" - scope="row">Purchased From</th>
                            <td><a href='{{url("/lread/{$leveranciers[0]->id}")}}'>{{$orders[0]->order_supplier}}</a></td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered_ table-striped table-responsive_">

                    <tbody>
                        <tr>
                            <th class="text-nowrap-" scope="row">Customer Name</th>
                            <td><a href='{{url("/kread/{$orders[0]->client_id}")}}'>{{$orders[0]->order_clients}}</a></td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" - scope="row">Email</th>
                            <td><a href="mailto:#">{{$orders[0]->company_email}}</a></td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row pb-2 mb-3 border-bottom">
            <div class="col-md-12">
                <span class="title">Address Information</span>
            </div>
        </div>

        <div class="row pb-2 mb-3 border-bottom">
            <div class="col-md-12">

                <div class="bd-example">
                  <address>
                    <strong>
                    {{$orders[0]->company_name}}
                    </strong><br>
                    {{$orders[0]->company_primary_contact}}<br>
                    {{$orders[0]->company_street}}<br>
                    {{$orders[0]->company_country}}<br/>
                    <abbr title="Phone">P:</abbr>
                    {{$orders[0]->company_telephone}}
                    </address>
                                      <address>
                    <strong>Full Name</strong><br>
                    <a href="mailto:#">{{$orders[0]->company_email}}</a>
                  </address>
                </div>
            </div>

        </div>

        <div class="row pb-2 mb-3 border-bottom">
            <div class="col-md-12">
                <span class="title">Items Ordered</span>
            </div>
        </div>

        <div class="row pb-2 mb-3 border-bottom">
            <div class="col-md-12">
                <table class="table table-striped" id="items-ordered">
                    <thead>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Attatchment</th>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order) 
             			<tr>
						  	<td>
						      	<a href="#" class="order-view-edit_" data-type="text" data-column="order_product" data-url="{{url('/order/edit',['id'=>$order->id])}}" data-pk="{{$order->id}}" data-title="change" data-name="order_product">
					          	<?php
					              	$order_product = explode(',', $order->order_product);

					              	foreach ($order_product as $_product)
					              	{
					                  	echo "{$_product}<br/>";
					              	}

					          	?>
						      	</a>
						  	</td>

						  	<td>
						      	<a href="#" class="order-view-edit_" data-type="text" data-column="order_amount" data-url="{{url('/order/edit',['id'=>$order->id])}}" data-pk="{{$order->id}}" data-title="change" data-name="order_amount">
						        <?php
						            $order_amount = explode(',', $order->order_amount);
						            foreach ($order_amount as $_amount)
						            {
						                echo "{$_amount}<br/>";
						            }
						        ?>
						      	</a>
						  	</td>
						  	<th>
						      	<a href="#" class="order-view-edit_" data-type="text" data-column="order_amount" data-url="{{url('/order/edit',['id'=>$order->id])}}" data-pk="{{$order->id}}" data-title="change" data-name="order_amount">
						        <?php
						            $order_price = explode(',', $order->order_price);
                                    foreach ($order_price as $_price)
						            {
                                        if($_price !==''){
                                            echo number_format($_price,2)."<br/>";
                                        }
						                
						            }

						        ?>
                                </a>
                            </th>
                            <td>
                                <ul class="attachment">
                                    @if($order->upload_quotation_received !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->upload_quotation_received}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Quotation received from client
                                        </a>
                                    </li>
                                    @endif @if($order->generate_quotation_request !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->generate_quotation_request}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Request for quotation from supplier(s)
                                        </a>
                                    </li>
                                    @endif @if($order->upload_recieved_quotation !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->upload_recieved_quotation}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Request(s) received from supplier(s)
                                        </a>
                                    </li>
                                    @endif @if($order->generate_quote !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->generate_quote}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Quotation sent to client
                                        </a>
                                    </li>
                                    @endif @if($order->upload_client_confirmation !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->upload_client_confirmation}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Received client confirmation
                                        </a>
                                    </li>
                                    @endif 
                                    @if($order->send_confirmation_to_supplier !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->send_confirmation_to_supplier}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Confirmation sent to supplier
                                        </a>
                                    </li>
                                    @endif 
                                    @if($order->upload_confirmation_supplier_doc !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->upload_confirmation_supplier_doc}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Received confirmation from supplier
                                        </a>
                                    </li>
                                    @endif 
                                    @if($order->generate_confirmation_to_client_doc !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->generate_confirmation_to_client_doc}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Sent confirmation to supplier
                                        </a>
                                    </li>
                                    @endif 
                                    @if($order->upload_delivery_document !== "")
                                    <li>
                                        <a href="{{ url('/') }}/{{$order->upload_delivery_document}}" target="_blank">
                                            <img src="{{ asset('storage/if_pdf_3745.png') }}" /> Upload delivery document from supplier
                                        </a>
                                    </li>
                                    @endif

                                </ul>

                            </td>
                        </tr>
                    @endforeach
                	</tbody>
                </table>
            </div>
        </div>

        <div class="row pb-2 mb-3 border-bottom">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <!-- <span class="title">Order Totals</span> -->
            </div>

        </div>

        <div class="row pb-2 mb-3 border-bottom">

            <div class="col-md-6"></div>
            <div class="col-md-6">

            </div>
        </div>

    </div>

</main>
@endsection