@extends('layouts.mainpdf')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <br/>
            <br/>
            <span style="color:#fefefe;">resources\views\quotation\statusNineTenElevenTwelve\pdf\generate-delivery-document.blade.php</span>
            <ul class="nav nav-tabs ul-center" role="tablist">
       
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE QUOTE DELIVERY DOCUMENT FOR CLIENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home" role="tab">SEND EMAIL TO CLIENT</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">  
              <div class="tab-pane active" id="profile" role="tabpanel">
                <div class="row mt-3"> 
                  <div class="col-md-3 mb-3">   
                    <div class="form-group">
                      <select class="form-control" id="localization">
                        <option value="en">English</option>
                        <option value="fr">French</option>
                        <option value="nl">Dutch</option>
                        <option value="de">German</option>
                      </select>  
                    </div>  
                  </div>  
                </div>  

                <!-- en -->  
                <div id="en">               
                  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">                            
                    <input type="hidden" name="filename" value="Delivery Note" />       
                    <textarea class="ckeditor" name="editor" id="editor">
                      <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>
                      <div>
                          <div>
                              <div>
                                      <p><strong>BEL-TECH</strong>NOLOGIES nv/sa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Rapaartakkerlaan 17 -19&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> B-9OBO Lochristi I Belgium&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Tel . +32 (O)g 355 24 41&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Fax +32 (O)g 355 83 30&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_name'] }}</strong>
                                      <br /> Gsm +32 (0)475 24 12 OB&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Attn. MR. {{ $orders['contact_person_last_name'] }} {{ $orders['contact_person_first_name'] }}
                                      <br /> e-mail : info @ bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $orders['company_street'] }}, {{ $orders['company_number'] }}
                                      <br /> URL: www.bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $orders['company_zip'] }} {{ $orders['company_city'] }}
                                      <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_country'] }}</strong></p>
                              </div>
                          </div>
                      </div>

                      <div>
                          <p><strong>DELIVERY NOTE:</strong></p>
                          <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                  <tr>
                                      <td style="width:76px">
                                          <p style="text-align:center"><strong>DATE</strong></p>
                                      </td>
                                      <td style="width:123px">
                                          <p style="text-align:center"><strong>VAT-NUMBER</strong></p>
                                      </td>
                                      <td style="width:142px">
                                          <p style="text-align:center"><strong>DOC.NUMBER</strong></p>
                                      </td>
                                      <td style="width:142px">
                                          <p style="text-align:center"><strong>CUSTOMERNBR</strong></p>
                                      </td>
                                      <td style="width:151px">
                                          <p style="text-align:center"><strong>TRANSPORT MODE</strong></p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:34px; width:76px">
                                          <p style="text-align:center">{{ date('d/m/y') }}&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:123px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">{{ $orders['vn'] }}&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:142px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">{{ $orders['client_reference_number'] }}&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:142px">
                                          <p style="text-align:center">{{ substr($orders['id'],0, 2) }}.{{ substr($orders['id'],2) }} </p>
                                      </td>
                                      <td style="height:34px; width:151px">
                                          <p style="text-align:center">{{ $orders['transport_company'] }}</p>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          
                          <p>&nbsp;</p>


                          <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                 <tr>
                                       <td style="height:26px; width:78px">
                                          <p style="text-align:center"><strong>NUMBER</strong></p>
                                      </td>
                                      <td style="height:26px; width:340px">
                                          <p style="text-align:center"><strong>DESCRIPTION</strong></p>
                                      </td>
                                      <td style="height:26px; width:91px">
                                          <p style="text-align:center"><strong>PARTS IN</strong></p>
                                      </td>
                                      <td style="height:26px; width:126px">
                                          <p style="text-align:center"><strong>TOTAL OUT</strong></p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:125px; width:78px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>

                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if($amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>    
                                            @else
                                              <p style="text-align:center"></p>                                                     
                                            @endif
                                          @endforeach
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:340px">
                                          <p style="margin-left:40px">Your order Nr. {{ $orders['order_number_from_client'] }} &nbsp;du {{ date('m/d/y') }}&nbsp;</p>

                                          <p style="margin-left:40px">For the {{ $orders['order_subject'] }}</p>
                                          <?php                                     
                                          $order_product = explode(',',$orders['order_product'])
                                          ?>
                                          @foreach($order_product as $key => $product)
                                          <p style="margin-left:40px">{{ $order_product[$key] }}</p>
                                          @endforeach


                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:91px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if( $amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>
                                            @else
                                              <p style="text-align:center"></p>
                                            @endif  
                                          @endforeach
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:126px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if( $amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>
                                            @else
                                              <p style="text-align:center"></p>
                                            @endif    
                                          @endforeach


                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:33px; width:78px">
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:33px; width:340px">
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:33px; width:91px">
                                          <p style="text-align:center"><strong>Total </strong></p>
                                      </td>


                                      <?php $amounts = explode(',',$orders['order_amount']); ?>

                                      <td style="height:33px; width:126px">
                                          <p style="text-align:center">{{ number_format(array_sum($amounts),2) }}</p>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                          <p>Intra-Community supply</p>

                          <p>The Parties explicitly agree that their contractual relations are governed exclusively by these general terms and conditions of sale. The goods are shipped at the risk of the buyer. The control of the goods, quality and quantity, happens upon delivery. Complaints will not be accepted if they were not listed on the delivery note or on the invoice at the time of delivery, and confirmed in writing within three days.</p>

                          <p>For reception in good condition :</p>
                      </div>

                    </textarea> <!-- CKEditor  !-->
                  </form>
                </div>   
                <!-- fr -->  
                <div id="fr">               
                  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">                            
                    <input type="hidden" name="filename" value="Delivery Note" />       
                    <textarea class="ckeditor" name="editor" id="editor">
                      <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>
                      <div>
                          <div>
                              <div>
                                      <p><strong>BEL-TECH</strong>NOLOGIES nv/sa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Rapaartakkerlaan 17 -19 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> B-9OBO Lochristi I Belgium&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Tel . +32 (O)g 355 24 41&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Fax +32 (O)g 355 83 30&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_name'] }}</strong>
                                      <br /> Gsm +32 (0)475 24 12 OB&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Attn. MR. {{ $orders['contact_person_last_name'] }} {{ $orders['contact_person_first_name'] }}
                                      <br /> e-mail : info @ bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $orders['company_street'] }}, {{ $orders['company_number'] }}
                                      <br /> URL: www.bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $orders['company_zip'] }} {{ $orders['company_city'] }}
                                      <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_country'] }}</strong></p>
                              </div>
                          </div>
                      </div>

                      <div>
                          <p><strong>BON DE LIVRAISON</strong></p>
                          <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                  <tr>
                                      <td style="width:76px">
                                          <p style="text-align:center"><strong>DATE</strong></p>
                                      </td>
                                      <td style="width:123px">
                                          <p style="text-align:center"><strong>NUMERO T.V.A.</strong></p>
                                      </td>
                                      <td style="width:142px">
                                          <p style="text-align:center"><strong>NUMERO DOC.</strong></p>
                                      </td>
                                      <td style="width:142px">
                                          <p style="text-align:center"><strong>NUMERO CLIENT</strong></p>
                                      </td>
                                      <td style="width:151px">
                                          <p style="text-align:center"><strong>CONDITIONS</strong></p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:34px; width:76px">
                                          <p style="text-align:center">{{ date('d/m/y') }}&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:123px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">{{ $orders['vn'] }}&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:142px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">{{ $orders['client_reference_number'] }}&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:142px">
                                          <p style="text-align:center">{{ substr($orders['id'],0, 2) }}.{{ substr($orders['id'],2) }} </p>
                                      </td>
                                      <td style="height:34px; width:151px">
                                          <p style="text-align:center">{{ $orders['transport_company'] }}</p>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          
                          <p>&nbsp;</p>


                          <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                 <tr>
                                       <td style="height:26px; width:78px">
                                          <p style="text-align:center"><strong>NOMBRE</strong></p>
                                      </td>
                                      <td style="height:26px; width:340px">
                                          <p style="text-align:center"><strong>DESIGNATION</strong></p>
                                      </td>
                                      <td style="height:26px; width:91px">
                                          <p style="text-align:center"><strong>QUANTITY IN</strong></p>
                                      </td>
                                      <td style="height:26px; width:126px">
                                          <p style="text-align:center"><strong>TOTAL OUT</strong></p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:125px; width:78px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>

                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if($amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>    
                                            @else
                                              <p style="text-align:center"></p>                                                     
                                            @endif
                                          @endforeach
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:340px">
                                          <p style="margin-left:40px">Votre commande Nr. {{ $orders['order_number_from_client'] }} &nbsp;du {{ date('m/d/y') }}&nbsp;</p>

                                          <p style="margin-left:40px">"Obturateur" {{ $orders['order_subject'] }}</p>
                                          <?php                                     
                                          $order_product = explode(',',$orders['order_product'])
                                          ?>
                                          @foreach($order_product as $key => $product)
                                          <p style="margin-left:40px">{{ $order_product[$key] }}</p>
                                          @endforeach


                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:91px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if( $amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>
                                            @else
                                              <p style="text-align:center"></p>
                                            @endif  
                                          @endforeach
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:126px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if( $amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>
                                            @else
                                              <p style="text-align:center"></p>
                                            @endif    
                                          @endforeach


                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:33px; width:78px">
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:33px; width:340px">
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:33px; width:91px">
                                          <p style="text-align:center"><strong>Total </strong></p>
                                      </td>


                                      <?php $amounts = explode(',',$orders['order_amount']); ?>

                                      <td style="height:33px; width:126px">
                                          <p style="text-align:center">{{ number_format(array_sum($amounts),2) }}</p>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                          <p>Livraison intracommunautaire</p>

                          <p>Les parties conviennent expressement que les presentes conditions generales regissent leurs relations contractuelles a l'exclusion de toutes autres. Les marchandises voyagent aux risques et perils du destinataire. La verification de la merchandise, quantite et qualite, doit se fair a le reception. Aucune reclamation ne pourra etre prise en consideration, si elle n'a pas ete actee par ecrit sur la note d'envoie ou sur la facture au moment de la livraison, et confirmee par ecrit dans les trois jours.</p>

                          <p>Pour acquit :</p>
                      </div>

                    </textarea> <!-- CKEditor  !-->
                  </form>
                </div>    
                <!-- nl -->  
                <div id="nl">               
                  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">                            
                    <input type="hidden" name="filename" value="Delivery Note" />       
                    <textarea class="ckeditor" name="editor" id="editor">
                      <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>
                      <div>
                          <div>
                              <div>
                                      <p><strong>BEL-TECH</strong>NOLOGIES nv/sa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Rapaartakkerlaan 17 -19&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> B-9OBO Lochristi I Belgium&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Tel . +32 (O)g 355 24 41&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <br /> Fax +32 (O)g 355 83 30&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_name'] }}</strong>
                                      <br /> Gsm +32 (0)475 24 12 OB&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Attn. MR. {{ $orders['contact_person_last_name'] }} {{ $orders['contact_person_first_name'] }}
                                      <br /> e-mail : info @ bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $orders['company_street'] }}, {{ $orders['company_number'] }}
                                      <br /> URL: www.bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $orders['company_zip'] }} {{ $orders['company_city'] }}
                                      <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_country'] }}</strong></p>
                              </div>
                          </div>
                      </div>

                      <div>
                          <p><strong>LEVERBON</strong></p>
                          <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                  <tr>
                                      <td style="width:76px">
                                          <p style="text-align:center"><strong>DATUM</strong></p>
                                      </td>
                                      <td style="width:123px">
                                          <p style="text-align:center"><strong>BTW.NUMMER</strong></p>
                                      </td>
                                      <td style="width:142px">
                                          <p style="text-align:center"><strong>DOC.NUMMER</strong></p>
                                      </td>
                                      <td style="width:142px">
                                          <p style="text-align:center"><strong>KLANTNUMMER</strong></p>
                                      </td>
                                      <td style="width:151px">
                                          <p style="text-align:center"><strong>TRANSPORTMODE</strong></p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:34px; width:76px">
                                          <p style="text-align:center">{{ date('d/m/y') }}&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:123px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">{{ $orders['vn'] }}&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:142px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">{{ $orders['client_reference_number'] }}&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:34px; width:142px">
                                          <p style="text-align:center">{{ substr($orders['id'],0, 2) }}.{{ substr($orders['id'],2) }} </p>
                                      </td>
                                      <td style="height:34px; width:151px">
                                          <p style="text-align:center">{{ $orders['transport_company'] }}</p>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          
                          <p>&nbsp;</p>


                          <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                 <tr>
                                       <td style="height:26px; width:78px">
                                          <p style="text-align:center"><strong>AANTAL</strong></p>
                                      </td>
                                      <td style="height:26px; width:340px">
                                          <p style="text-align:center"><strong>BESCHRIJVING</strong></p>
                                      </td>
                                      <td style="height:26px; width:91px">
                                          <p style="text-align:center"><strong>EENHEID IN</strong></p>
                                      </td>
                                      <td style="height:26px; width:126px">
                                          <p style="text-align:center"><strong>TOTAAL UIT</strong></p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:125px; width:78px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>

                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if($amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>    
                                            @else
                                              <p style="text-align:center"></p>                                                     
                                            @endif
                                          @endforeach
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:340px">
                                          <p style="margin-left:40px">Uw order nr. {{ $orders['order_number_from_client'] }} &nbsp;du {{ date('m/d/y') }}&nbsp;</p>

                                          <p style="margin-left:40px">Het {{ $orders['order_subject'] }}</p>
                                          <?php                                     
                                          $order_product = explode(',',$orders['order_product'])
                                          ?>
                                          @foreach($order_product as $key => $product)
                                          <p style="margin-left:40px">{{ $order_product[$key] }}</p>
                                          @endforeach


                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:91px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if( $amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>
                                            @else
                                              <p style="text-align:center"></p>
                                            @endif  
                                          @endforeach
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:125px; width:126px">
                                          <p style="text-align:center">&nbsp;</p>

                                          <p style="text-align:center">&nbsp;</p>
                                          <?php $amounts = explode(',',$orders['order_amount']); ?>
                                          @foreach($amounts as $amount)
                                            @if( $amount)
                                              <p style="text-align:center">{{ number_format($amount,2) }}</p>
                                            @else
                                              <p style="text-align:center"></p>
                                            @endif    
                                          @endforeach


                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:33px; width:78px">
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:33px; width:340px">
                                          <p style="text-align:center">&nbsp;</p>
                                      </td>
                                      <td style="height:33px; width:91px">
                                          <p style="text-align:center"><strong>Total </strong></p>
                                      </td>


                                      <?php $amounts = explode(',',$orders['order_amount']); ?>

                                      <td style="height:33px; width:126px">
                                          <p style="text-align:center">{{ number_format(array_sum($amounts),2) }}</p>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                          <p>Intra-Communautaire Levering</p>

                          <p>De partijen komen uitdrukkelijk overeen dat hun contractuele betrekkingen uitsluitend geregeld worden door deze algemene verkoopsvoorwaarden. De
                          goederen worden verzonden op risico van de koper. De controle van de goederen, kwaliteit en kwantiteit, gebeuren bij levering. Klachten zullen niet
                          worden aanvaard indien zU niet vermeld werden op de leveringsbon of op de factuur op het ogenblik van de levering, en schriftelijk bevestigd binnen de
                          drie dagen,.</p>

                          <p>Voor onWanqst</p>
                      </div>

                    </textarea> <!-- CKEditor  !-->
                  </form>
                </div> 
                <!-- de -->  
                

              </div>
              <div class="tab-pane" id="home" role="tabpanel">


                  <br/>


                  <div class="alert alert-danger form-error-msg" style="display:none;">
                      <ul></ul>
                  </div>

                  <p>Sends request quotation to supplier</p>

                  <form name=f1 id="post-generate-delivery-document" method="post" action="{{ url('/sent-delivery-document-to-supplier') }}" role="form" enctype="multipart/form-data">
                      {{ csrf_field() }}


                      <input type="hidden" name="id" value="{{ $orders['order_id'] }}">
                      <div class="messages"></div>

                      <div class="row">
                          <div class="form-group col-sm-12">
                              <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name"  value="{{ $orders['company_name'] }}" placeholder="Name" >
                          </div>
                          <div class="form-group col-sm-12">

                            <?php 
                            $emails = explode(',',$orders['contact_person_email']);
                            $emails[] = $orders['company_email'];
                            ?>      

                            <!-- <input type="email" placeholder="Email" class="form-control" id="email" name="email"  value="{{ $orders['company_email'] }}" placeholder="Email" > -->

                            <select class="form-control" id="localization">
                              @foreach($emails as $email)
                              <option value="{{ $email }}">{{ $email }}</option>
                              @endforeach
                            </select>   
                          </div>
                          <div class="form-group col-sm-12">

                              <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject"  value="" placeholder="Subject" >
                          </div>
                          <div class="form-group col-sm-12">
                             <div id="text">
                                <div>
                                   <input type="file" name="attachment[]" class="form-control-file" id="attachment" aria-describedby="fileHelp"/>
                                </div>
                             </div>
                          </div>
                          <div class="form-group col-sm-12">
                             <input type="button" id="add-file-field" name="add" value="Add input field" />
                          </div>
                          <script type="text/javascript">                            
                             // This will add new input field
                             $("#add-file-field").click(function(){
                               $("#text").append("<div class='added-field'><input name='attachment[]' type='file' /><input type='button' class='remove-btn' value='Remove Field' /></div>");
                             });
                             
                             // The live function binds elements which are added to the DOM at later time
                             // So the newly added field can be removed too
                             $("#text").on('click', '.remove-btn',function() {
                               $(this).parent().remove();
                             });             
                          </script>
                      </div>

                      <div class="form-group">
                          <textarea id="message" class="form-control" rows="5" name="message" placeholder="Enter your message" ></textarea>
                      </div>

                      <button type="submit" id="form-btn" class="btn btn-success pull-right">Send</button>
                      <input type="reset" class="btn btn-danger" value="Clear" />


                  </form>

              </div>
            </div>
        </div><!-- /.8 -->
    </div> <!-- /.row-->
</div>
<!-- /.container-->

@endsection
