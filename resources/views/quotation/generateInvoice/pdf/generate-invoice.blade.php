@extends('layouts.mainpdf')

@section('content')
<div class="container">

           
    <div class="row">

        <div class="col-lg-12">



            <br/>
            <br/>
            <span style="color:#fefefe;">resources\views\quotation\generateInvoice\pdf\generate-invoice.blade.php</span>
            <ul class="nav nav-tabs ul-center" role="tablist">
          
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE INVOICE</a>
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
                      <input type="hidden" name="filename" value="Invoice" />                        
                      <textarea cols="80" class="ckeditor en" name="editor" id="editor" rows="10">

                   
                          <p><img alt="" src="{{url('assets/images/BELTEC-logo.png')}}" style="height:66px; width:250px" /></p>

                          <p style="margin-left:3.75in" key="home"><strong>{{ $orders['company_name'] }}</strong>
                              <br />

                              <p style="margin-left:3.75in">
                                  <br />
                                  <u>{{ $orders['contact_person_first_name'] }}</u>
                                  <br />
                                  <strong>{{ $orders['company_street'] }},{{ $orders['company_number'] }}<br />
                                    {{ $orders['company_zip'] }},{{ $orders['company_city'] }}</strong>
                                  <br />
                                  <strong><strong>{{ $orders['company_country'] }}  </strong></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                              <p style="margin-left:3.75in">&nbsp;&nbsp;</p>

                              <p><strong><span style="font-size:18px"><strong>INVOICE</strong></span>
                                  </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>

                              <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                          <th style="width:95px">
                                              <p style="text-align: center;">DATE</p>
                                          </th>
                                          <th style="width:132px">
                                              <p style="text-align: center;">CUSTOMER&nbsp; V.A.T.-number</p>
                                          </th>
                                          <th style="width:113px">
                                              <p style="text-align: center;">Invoice number</p>
                                          </th>
                                          <th style="width:142px">
                                              <p style="text-align: center;">Customer Number</p>
                                          </th>
                                         
                                          <th style="width:1px">
                                              <p style="text-align: center;">Payment CONDITIONS</p>
                                          </th>
                                      </tr>
                                      <tr>
                                          <td style="height:55px; width:95px">
                                              <p style="text-align: center;">{{ date('d/m/y') }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:132px">
                                              <p style="text-align: center;">{{ $orders['vn'] }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:113px">
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4) }}</p>
                                          </td>
                                          <td style="height:55px; width:142px">
                                              <p style="text-align:center">&nbsp;</p>
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4, -5) }}</p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                         
                                          <td style="height:55px; width:236px">
                                              <p style="text-align: center;">Our terms are NET 30 days from date of invoice. <span style="color:red">DATE OF PAYMENT {{ date('d/m/y') }}</span></p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>

                              <p>&nbsp;</p>

                              <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                        <th colspan="3" style="width:85px">
                                            <p style="text-align: center;">Qty.</p>
                                        </th>
                                        <th style="width:406px">
                                            <p style="text-align: center;">Description</p>
                                        </th>
                                        <th style="width:114px">
                                            <p>&nbsp; &nbsp;Costs per piece</p>
                                        </th>
                                        <th style="width:114px">
                                            <p style="text-align: center;">Total price</p>
                                        </th>
                                      </tr>
                                      <tr>
                                          <td colspan="3" style="height:32px; width:85px">
                                              <p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:406px">
                                              <p style="text-align: center;">&nbsp; Your order {{ $orders['order_reference_number'] }}&nbsp; dated {{ $orders['created_at'] }}&nbsp;&nbsp; for &nbsp;{{ $orders['order_subject'] }}</p>

                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                      </tr>

                                      <?php $amount = explode(',',$orders['order_amount']); ?>
                                      <?php $price = explode(',',$orders['order_price']); ?>

                                      <?php $total = 0; ?>

                                      @foreach(explode(',',$orders['order_product']) as $key => $product)

                                      <?php $subtotal = $price[$key] * $amount[$key]; ?>

                                      <?php $total += $subtotal; ?>

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            @if($amount[$key])
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ number_format($amount[$key],2) }}</p>
                                            @else
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                            @endif
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;{{ $product }}</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            @if($price[$key])
                                              <p style="text-align: center;">&nbsp;{{ number_format($price[$key],2) }} &euro;</p>
                                            @else
                                              <p style="text-align: center;">&nbsp;00.00 &euro;</p>
                                            @endif  
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p style="text-align: center;">&nbsp;{{ number_format($amount[$key]*$price[$key],2) }} &euro;</p>
                                        </td>
                                    </tr>

                                    @endforeach

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;Transport &amp; Packaging TNT</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                          @if($orders['transport_price'])
                                            <p style="text-align: center;">{{ $orders['transport_price'] }} &euro;</p>
                                          @else
                                            <p style="text-align: center;">00.00 &euro;</p>
                                          @endif  
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">Subtotal &nbsp;</p>
                                        </th>

                                        <td style="height:5px; width:114px">
                                            @if($total)
                                              <p style="text-align: center;"> {{ number_format($total,2) }} &euro; </p>
                                            @else
                                              <p style="text-align: center;"> 00.00 &euro; </p>
                                            @endif  
                                        </td>
                                    </tr>
                                  
                                    

                                    <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                                    <?php $total_vat = ($percentage / 100) * $total; ?>
                                 
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">V.A.T. {{$percentage}}/% &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                             <p style="text-align: center;">{{ number_format($total_vat,2) }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">TOTAL &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                            @if($orders['transport_price'])  
                                              <p style="text-align: center;"><strong>{{ number_format($total + $total_vat,2) }} &euro;</strong></p>
                                            @else
                                              <p style="text-align: center;"><strong>00.00 &euro;</strong></p>
                                            @endif  
                                        </td>
                                    </tr>

                                   
                                  </tbody>
                              </table>

                              <div>
                                  <div>
                                      <div>
                                          <p>Act is not subject to Belgian VAT/BTW. Art. 21 &sect;2 WBTW. BTW/VAT to be honnored by the Contractor Art. 51 WBTW- &nbsp;Art.44 and Art.196 of the European VAT/BTW-Directives &nbsp;- &nbsp;B2B-Rule.</p>
                                      </div>
                                  </div>
                              </div>

                              <p><strong>Please make payment of this invoice free of costs on our Bankaccount at the<br />
                                    KBC-Bank &nbsp; &nbsp; IBAN BE69 4428 6426 5178</strong>
                                  <br /> Address : &nbsp;KBC-KREDIETBANK NV. &nbsp; &nbsp; Kerkstraat, 57 &nbsp; &nbsp;B-9200 &nbsp;Dendermonde &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; Swift &nbsp;: &nbsp;KREDBEBB</p>

                              <p><strong><span style="font-size:10px">The parties agree expressly that these general conditions govern their contractual exclusion of all others. The goods travel at the risk and peril of the recipient. The verification of the goods, quantity and quality, should be at the front desk. No claim shall be taken into account, if it has not been noted in writing on the note to send or on the invoice at the time of delivery, and confirmed in writing within three days</span></strong>
                                  <br /> &nbsp;
                              </p>

                              <p><strong>&nbsp;</strong></p>

                              <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>


                     

                      </textarea>
                    </form>
                  </div>  

                  <!-- fr -->
                  <div id="fr">  
                    <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                      <input type="hidden" name="filename" value="Invoice" />      
                    
                      <textarea cols="80" class="ckeditor en" name="editor" id="editor" rows="10">

                          
                          <p><img alt="" src="{{url('assets/images/BELTEC-logo.png')}}" style="height:66px; width:250px" /></p>

                          <p style="margin-left:3.75in" key="home"><strong>{{ $orders['company_name'] }}</strong>
                              <br />

                              <p style="margin-left:3.75in">
                                  <br />
                                  <u>{{ $orders['contact_person_first_name'] }}</u>
                                  <br />
                                  <strong>{{ $orders['company_street'] }},{{ $orders['company_number'] }}<br />
                                    {{ $orders['company_zip'] }},{{ $orders['company_city'] }}</strong>
                                  <br />
                                  <strong><strong>{{ $orders['company_country'] }}  </strong></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                              <p style="margin-left:3.75in">&nbsp;&nbsp;</p>

                              <p><strong><span style="font-size:18px"><strong>FACTURE</strong></span>
                                  </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>

                              <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                          <th style="width:95px">
                                              <p style="text-align: center;">DATE</p>
                                          </th>
                                          <th style="width:132px">
                                              <p style="text-align: center;">NUMERO T.V.A.</p>
                                          </th>
                                          <th style="width:113px">
                                              <p style="text-align: center;">NUMERO DOC.</p>
                                          </th>
                                          <th style="width:142px">
                                              <p style="text-align: center;">NUMERO CLIENT</p>
                                          </th>
                                         
                                          <th style="width:1px">
                                              <p style="text-align: center;">CONDITIONS</p>
                                          </th>
                                      </tr>
                                      <tr>
                                          <td style="height:55px; width:95px">
                                              <p style="text-align: center;">{{ date('d/m/y') }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:132px">
                                              <p style="text-align: center;">{{ $orders['vn'] }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:113px">
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4) }}</p>
                                          </td>
                                          <td style="height:55px; width:142px">
                                              <p style="text-align:center">&nbsp;</p>
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4, -5) }}</p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                         
                                          <td style="height:55px; width:236px">
                                              <p style="text-align: center;">A payer 20 jours à réception de la facture. <span style="color:red">Echéance le {{ date('d/m/y') }}</span></p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>

                              <p>&nbsp;</p>

                              <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                        <th colspan="3" style="width:85px">
                                            <p style="text-align: center;">NOMBRE</p>
                                        </th>
                                        <th style="width:406px">
                                            <p style="text-align: center;">DESIGNATION</p>
                                        </th>
                                        <th style="width:114px">
                                            <p>&nbsp; &nbsp;PRIX PAR UNITE</p>
                                        </th>
                                        <th style="width:114px">
                                            <p style="text-align: center;">PRIX TOTAL</p>
                                        </th>
                                      </tr>
                                      <tr>
                                          <td colspan="3" style="height:32px; width:85px">
                                              <p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:406px">
                                              <p style="text-align: center;">&nbsp; Votre commande Nr. {{ $orders['order_reference_number'] }}&nbsp; du {{ $orders['created_at'] }}&nbsp;&nbsp; {{ $orders['order_subject'] }}</p>

                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                      </tr>

                                      <?php $amount = explode(',',$orders['order_amount']); ?>
                                      <?php $price = explode(',',$orders['order_price']); ?>

                                      <?php $total = 0; ?>

                                      @foreach(explode(',',$orders['order_product']) as $key => $product)

                                      <?php $subtotal = $price[$key] * $amount[$key]; ?>

                                      <?php $total += $subtotal; ?>

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            @if($amount[$key])
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ number_format($amount[$key],2) }}</p>
                                            @else
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                            @endif
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;{{ $product }}</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            @if($price[$key])
                                              <p style="text-align: center;">&nbsp;{{ number_format($price[$key],2) }} &euro;</p>
                                            @else
                                              <p style="text-align: center;">&nbsp;00.00 &euro;</p>
                                            @endif  
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p style="text-align: center;">&nbsp;{{ number_format($amount[$key]*$price[$key],2) }} &euro;</p>
                                        </td>
                                    </tr>

                                    @endforeach

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;Transports A Düsseldorf</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                          @if($orders['transport_price'])
                                            <p style="text-align: center;">{{ $orders['transport_price'] }} &euro;</p>
                                          @else
                                            <p style="text-align: center;">00.00 &euro;</p>
                                          @endif  
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">Subtotal &nbsp;</p>
                                        </th>

                                        <td style="height:5px; width:114px">
                                            @if($total)
                                              <p style="text-align: center;"> {{ number_format($total,2) }} &euro; </p>
                                            @else
                                              <p style="text-align: center;"> 00.00 &euro; </p>
                                            @endif  
                                        </td>
                                    </tr>
                                  
                                    

                                    <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                                    <?php $total_vat = ($percentage / 100) * $total; ?>
                                 
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">V.A.T. {{$percentage}}/% &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                             <p style="text-align: center;">{{ number_format($total_vat,2) }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">TOTAL &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                            @if($orders['transport_price'])  
                                              <p style="text-align: center;"><strong>{{ number_format($total + $total_vat,2) }} &euro;</strong></p>
                                            @else
                                              <p style="text-align: center;"><strong>00.00 &euro;</strong></p>
                                            @endif  
                                        </td>
                                    </tr>

                                   
                                  </tbody>
                              </table>

                              <div>
                                  <div>
                                      <div>
                                          <p>Service intracommunautaire avec report de perception. Prestation non soumise à la TVA Belge. Art 21 §2 Code TVA. Art 196 Directive TVA EC + Art.44 Directive TVA EC - Règle B2B</p>
                                      </div>
                                  </div>
                              </div>

                              <p><strong>Veuillez mentionner la date et le numero de la facture lors du payement.</strong>
                                  <br /> Les parties conviennent  expressement que les présentes conditions générales régissent leurs relations contractuelles à l’exclusion de toutes autres. Les marchandises voyagent aux risques et périls du destinataire. La vérification de la marchandise, quantité et qualité, doit se faire à la réception. Aucune réclamation ne pourra être prise en considération, si elle n’a pas été actée par écrit sur la note d’envoie ou sur la facture au moment de la livraison, et confirmée par écrit dans les trois jours. </p>

                       

                              <p><strong>&nbsp;</strong></p>

                              <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>


                     

                      </textarea>
                    </form>  
                  </div>  

                  <!-- nl -->
                  <div id="nl">  
                    <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                      <input type="hidden" name="filename" value="Invoice" />      
                    
                      <textarea cols="80" class="ckeditor en" name="editor" id="editor" rows="10">                        
                          
                          <p><img alt="" src="{{url('assets/images/BELTEC-logo.png')}}" style="height:66px; width:250px" /></p>

                          <p style="margin-left:3.75in" key="home"><strong>{{ $orders['company_name'] }}</strong>
                              <br />

                              <p style="margin-left:3.75in">
                                  <br />
                                  <u>{{ $orders['contact_person_first_name'] }}</u>
                                  <br />
                                  <strong>{{ $orders['company_street'] }},{{ $orders['company_number'] }}<br />
                                    {{ $orders['company_zip'] }},{{ $orders['company_city'] }}</strong>
                                  <br />
                                  <strong><strong>{{ $orders['company_country'] }}  </strong></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                              <p style="margin-left:3.75in">&nbsp;&nbsp;</p>

                              <p><strong><span style="font-size:18px"><strong>FACTUUR</strong></span>
                                  </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>

                              <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                          <th style="width:95px">
                                              <p style="text-align: center;">DATUM</p>
                                          </th>
                                          <th style="width:132px">
                                              <p style="text-align: center;">BTW-NUMMER</p>
                                          </th>
                                          <th style="width:113px">
                                              <p style="text-align: center;">DOC.NUMMER</p>
                                          </th>
                                          <th style="width:142px">
                                              <p style="text-align: center;">KLANTNUMMER</p>
                                          </th>
                                         
                                          <th style="width:1px">
                                              <p style="text-align: center;">BETALINGSVOORWAARDEN </p>
                                          </th>
                                      </tr>
                                      <tr>
                                          <td style="height:55px; width:95px">
                                              <p style="text-align: center;">{{ date('d/m/y') }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:132px">
                                              <p style="text-align: center;">{{ $orders['vn'] }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:113px">
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4) }}</p>
                                          </td>
                                          <td style="height:55px; width:142px">
                                              <p style="text-align:center">&nbsp;</p>
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4, -5) }}</p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                         
                                          <td style="height:55px; width:236px">
                                              <p style="text-align: center;">Te betalen 30 dagen na factuurdatum <span style="color:red">DATE OF PAYMENT {{ date('d/m/y') }}</span></p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>

                              <p>&nbsp;</p>

                              <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                        <th colspan="3" style="width:85px">
                                            <p style="text-align: center;">AANTAL</p>
                                        </th>
                                        <th style="width:406px">
                                            <p style="text-align: center;">BESCHRIJVING</p>
                                        </th>
                                        <th style="width:114px">
                                            <p>&nbsp; &nbsp;PRIJS PER EENHEID</p>
                                        </th>
                                        <th style="width:114px">
                                            <p style="text-align: center;">TOTAAL PRIJS</p>
                                        </th>
                                      </tr>
                                      <tr>
                                          <td colspan="3" style="height:32px; width:85px">
                                              <p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:406px">
                                              <p style="text-align: center;">&nbsp; Uw order nr. {{ $orders['order_reference_number'] }}&nbsp; dated {{ $orders['created_at'] }}&nbsp;&nbsp; &nbsp;{{ $orders['order_subject'] }}</p>

                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                      </tr>

                                      <?php $amount = explode(',',$orders['order_amount']); ?>
                                      <?php $price = explode(',',$orders['order_price']); ?>

                                      <?php $total = 0; ?>

                                      @foreach(explode(',',$orders['order_product']) as $key => $product)

                                      <?php $subtotal = $price[$key] * $amount[$key]; ?>

                                      <?php $total += $subtotal; ?>

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            @if($amount[$key])
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ number_format($amount[$key],2) }}</p>
                                            @else
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                            @endif
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;{{ $product }}</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            @if($price[$key])
                                              <p style="text-align: center;">&nbsp;{{ number_format($price[$key],2) }} &euro;</p>
                                            @else
                                              <p style="text-align: center;">&nbsp;00.00 &euro;</p>
                                            @endif  
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p style="text-align: center;">&nbsp;{{ number_format($amount[$key]*$price[$key],2) }} &euro;</p>
                                        </td>
                                    </tr>

                                    @endforeach

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;Transport &amp; Packaging TNT</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                          @if($orders['transport_price'])
                                            <p style="text-align: center;">{{ $orders['transport_price'] }} &euro;</p>
                                          @else
                                            <p style="text-align: center;">00.00 &euro;</p>
                                          @endif  
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">Subtotal &nbsp;</p>
                                        </th>

                                        <td style="height:5px; width:114px">
                                            @if($total)
                                              <p style="text-align: center;"> {{ number_format($total,2) }} &euro; </p>
                                            @else
                                              <p style="text-align: center;"> 00.00 &euro; </p>
                                            @endif  
                                        </td>
                                    </tr>
                                  
                                    

                                    <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                                    <?php $total_vat = ($percentage / 100) * $total; ?>
                                 
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">V.A.T. {{$percentage}}/% &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                             <p style="text-align: center;">{{ number_format($total_vat,2) }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">TOTAAL TE VOLDOEN &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                            @if($orders['transport_price'])  
                                              <p style="text-align: center;"><strong>{{ number_format($total + $total_vat,2) }} &euro;</strong></p>
                                            @else
                                              <p style="text-align: center;"><strong>00.00 &euro;</strong></p>
                                            @endif  
                                        </td>
                                    </tr>

                                   
                                  </tbody>
                              </table>


                              <p><strong>Vermeld bij betaling  factuurnummer en -datum a.u.b.</strong></p>

                              <p>De partijen komen uitdrukkelijk overeen dat hun contractuele betrekkingen uitsluitend geregeld worden door deze algemene verkoopsvoorwaarden. De goederen worden verzonden op risico van de koper. De controle van de goederen, kwaliteit en kwantiteit, gebeuren bij levering. Klachten zullen niet worden aanvaard indien zij niet vermeld werden op de leveringsbon of op de factuur op het ogenblik van de levering, en schriftelijk bevestigd binnen de drie dagen. 
                              </p>

                              <p><strong>IBAN KBC :  BE69 4428 6426 5178   BIC  KREDBEBB<br/>IBAN FORTIS : BE83 2930 1765 9715   BIC GEBABEBB</strong></p>

                              <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>


                     

                      </textarea>
                    </form>  
                  </div>  

                  <!-- de -->
                  <div id="de">  
                    <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                      <input type="hidden" name="filename" value="Invoice" />      
                    
                      <textarea cols="80" class="ckeditor en" name="editor" id="editor" rows="10">

                                                   
                          <p><img alt="" src="{{url('assets/images/BELTEC-logo.png')}}" style="height:66px; width:250px" /></p>

                          <p style="margin-left:3.75in" key="home"><strong>{{ $orders['company_name'] }}</strong>
                              <br />

                              <p style="margin-left:3.75in">
                                  <br />
                                  <u>{{ $orders['contact_person_first_name'] }}</u>
                                  <br />
                                  <strong>{{ $orders['company_street'] }},{{ $orders['company_number'] }}<br />
                                    {{ $orders['company_zip'] }},{{ $orders['company_city'] }}</strong>
                                  <br />
                                  <strong><strong>{{ $orders['company_country'] }}  </strong></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                              <p style="margin-left:3.75in">&nbsp;&nbsp;</p>

                              <p><strong><span style="font-size:18px"><strong>RECHNUNG:</strong></span>
                                  </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>

                              <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                          <th style="width:95px">
                                              <p style="text-align: center;">DATUM</p>
                                          </th>
                                          <th style="width:132px">
                                              <p style="text-align: center;">BTW-NUMMER</p>
                                          </th>
                                          <th style="width:113px">
                                              <p style="text-align: center;">DOC.NUMMER</p>
                                          </th>
                                          <th style="width:142px">
                                              <p style="text-align: center;">KUNDENNUMMER</p>
                                          </th>
                                         
                                          <th style="width:1px">
                                              <p style="text-align: center;">ZAHLUNGSBEDINGUNGEN</p>
                                          </th>
                                      </tr>
                                      <tr>
                                          <td style="height:55px; width:95px">
                                              <p style="text-align: center;">{{ date('d/m/y') }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:132px">
                                              <p style="text-align: center;">{{ $orders['vn'] }}&nbsp;</p>
                                          </td>
                                          <td style="height:55px; width:113px">
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4) }}</p>
                                          </td>
                                          <td style="height:55px; width:142px">
                                              <p style="text-align:center">&nbsp;</p>
                                              <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4, -5) }}</p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                         
                                          <td style="height:55px; width:236px">
                                              <p style="text-align: center;">Our terms are NET 30 days from date of invoice. DATE OF PAYMENT 09/12/2017</p>

                                              <p style="text-align: center;">&nbsp;</p>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>

                              <p>&nbsp;</p>

                              <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                      <tr>
                                        <th colspan="3" style="width:85px">
                                            <p style="text-align: center;">ANZAHL</p>
                                        </th>
                                        <th style="width:406px">
                                            <p style="text-align: center;">BESCHREIBUNG</p>
                                        </th>
                                        <th style="width:114px">
                                            <p>&nbsp; &nbsp;PREIS PRO STÜCK</p>
                                        </th>
                                        <th style="width:114px">
                                            <p style="text-align: center;">GESAMMTE PREIS</p>
                                        </th>
                                      </tr>
                                      <tr>
                                          <td colspan="3" style="height:32px; width:85px">
                                              <p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:406px">
                                              <p style="text-align: center;">&nbsp; Ihren Auftrag nr {{ $orders['order_reference_number'] }}&nbsp; dated {{ $orders['created_at'] }}&nbsp;&nbsp; for &nbsp;{{ $orders['order_subject'] }}</p>

                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                          <td style="height:32px; width:114px">
                                              <p>&nbsp;</p>
                                          </td>
                                      </tr>

                                      <?php $amount = explode(',',$orders['order_amount']); ?>
                                      <?php $price = explode(',',$orders['order_price']); ?>

                                      <?php $total = 0; ?>

                                      @foreach(explode(',',$orders['order_product']) as $key => $product)

                                      <?php $subtotal = $price[$key] * $amount[$key]; ?>

                                      <?php $total += $subtotal; ?>

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            @if($amount[$key])
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ number_format($amount[$key],2) }}</p>
                                            @else
                                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                            @endif
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;{{ $product }}</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            @if($price[$key])
                                              <p style="text-align: center;">&nbsp;{{ number_format($price[$key],2) }} &euro;</p>
                                            @else
                                              <p style="text-align: center;">&nbsp;00.00 &euro;</p>
                                            @endif  
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p style="text-align: center;">&nbsp;{{ number_format($amount[$key]*$price[$key],2) }} &euro;</p>
                                        </td>
                                    </tr>

                                    @endforeach

                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height:32px; width:85px">
                                            <p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:406px">
                                            <p style="text-align: center;">&nbsp;Transport &amp; Packaging TNT</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <td style="height:32px; width:114px">
                                          @if($orders['transport_price'])
                                            <p style="text-align: center;">{{ $orders['transport_price'] }} &euro;</p>
                                          @else
                                            <p style="text-align: center;">00.00 &euro;</p>
                                          @endif  
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">SUBTOTAAL &nbsp;</p>
                                        </th>

                                        <td style="height:5px; width:114px">
                                            @if($total)
                                              <p style="text-align: center;"> {{ number_format($total,2) }} &euro; </p>
                                            @else
                                              <p style="text-align: center;"> 00.00 &euro; </p>
                                            @endif  
                                        </td>
                                    </tr>
                                  
                                    

                                    <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                                    <?php $total_vat = ($percentage / 100) * $total; ?>
                                 
                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">V.A.T. {{$percentage}}/% &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                             <p style="text-align: center;">{{ number_format($total_vat,2) }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" style="height:5px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:5px; width:406px">
                                            <p>&nbsp;</p>
                                        </td>
                                        <th style="height:5px; width:114px">
                                            <p style="text-align: right;">Zu zhalen &nbsp;</p>
                                        </th>
                                        <td style="height:5px; width:114px">
                                            @if($orders['transport_price'])  
                                              <p style="text-align: center;"><strong>{{ number_format($total + $total_vat,2) }} &euro;</strong></p>
                                            @else
                                              <p style="text-align: center;"><strong>00.00 &euro;</strong></p>
                                            @endif  
                                        </td>
                                    </tr>

                                   
                                  </tbody>
                              </table>

                              <div>
                                  <div>
                                      <div>
                                          <p>Art.21 § 2 Belgische Wbtw. / art.44 Europaïsche Richtliën -  Durch Die Verwendung Ihrer Umsatsteuer-ID, geht die Steurerlast auf Sie über ( art.196) Europaïsche Richtliën + art.51 Belgische Wbtw.</p>
                                      </div>
                                  </div>
                              </div>

                              <p>
                                <strong>IBAN KBC  BE69 4428 6426 5178   BIC KREDBEBB<br />
                                    IBAN FORTIS BE 83 2930 1765 9715  BIC GEBABEBB</strong>
                              </p>

                            
                              <p><strong>&nbsp;</strong></p>

                              <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>

                              <p><strong>&nbsp;</strong></p>


                     

                      </textarea>
                    </form>  
                  </div>  
                  <!-- CKEditor  !-->                 

                </div>
                <div class="tab-pane" id="home" role="tabpanel">

                    <br/>

                    <div class="alert alert-danger form-error-msg" style="display:none;">
                        <ul></ul>
                    </div>

                    <p>Sends request quotation to client</p>


                    <form name=f1 id="post-generate-invoice" method="post" action="{{url('/generate-invoice')}}" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $orders['order_id'] }}">
                        <div class="messages"></div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name" value="{{ $orders['company_name'] }}" placeholder="Name">
                            </div>
                            <div class="form-group col-sm-12">
                                <?php 
                                $emails = explode(',',$orders['contact_person_email']);
                                $emails[] = $orders['company_email'];
                                ?>                             
                                <select class="form-control" id="localization">
                                  @foreach(array_reverse($emails, true) as $email)
                                  <option value="{{ $email }}">{{ $email }}</option>
                                  @endforeach
                                </select>  
                            </div>
                            <div class="form-group col-sm-12">

                                <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject" value="" placeholder="Subject">
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
                            <textarea id="message" class="form-control" rows="5" name="message" placeholder="Enter your message"></textarea>
                        </div>

                        <button type="submit" id="form-btn" class="btn btn-success pull-right">Send</button>
                        <input type="reset" class="btn btn-danger" value="Clear" />

                    </form>

                </div>

            </div>
        </div>
        <!-- /.8 -->
    </div>
    <!-- /.row-->
</div>
<!-- /.container-->
@endsection