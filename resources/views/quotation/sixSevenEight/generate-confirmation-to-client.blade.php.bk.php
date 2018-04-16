@extends('layouts.mainpdf')

@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">

            <br/>
            <br/>
            <span style="color:#fefefe;">resources\views\quotation\sixSevenEight\generate-confirmation-to-client.blade.php</span>
            <ul class="nav nav-tabs ul-center" role="tablist">
        
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE CLIENT CONFIRMATION</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div class="tab-pane active" id="profile" role="tabpanel">

                    <br/>
                    <br/>

                    <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                        
                        <input type="hidden"  name="filename"     value="Order confirmation to client" />

                        <!-- Database Connection -->
                        <input type="hidden"  name="DB_HOST"      value="<?php echo isset($_ENV['DB_HOST'])? $_ENV['DB_HOST']:''; ?>">  
                        <input type="hidden"  name="DB_DATABASE"  value="<?php echo isset($_ENV['DB_DATABASE'])? $_ENV['DB_DATABASE']:''; ?>">  
                        <input type="hidden"  name="DB_USERNAME"  value="<?php echo isset($_ENV['DB_USERNAME'])? $_ENV['DB_USERNAME']:''; ?>">  
                        <input type="hidden"  name="DB_PASSWORD"  value="<?php echo isset($_ENV['DB_PASSWORD'])? $_ENV['DB_PASSWORD']:''; ?>">     
                        
                        <input type="hidden"  name="id"           value="{{ $data['order_id'] }}"> 
                        <input type="hidden"  name="name"         value="{{ $data['company_name'] }}">                   
                        <input type="hidden"  name="email"        value="{{ $data['company_email'] }}">                
                        <input type="hidden"  name="subject"      value="Subject for this email">  
                        <input type="hidden"  name="from"         value="<?php echo isset($_ENV['MAIL_USERNAME'])? $_ENV['MAIL_USERNAME']: ''; ?>"> 

                        <input type="hidden"  name="order_status" value="GENERATE CONFIRMATION TO CLIENT DOC">  

                        <textarea style="display:none;" name="message">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</textarea> 


                        <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">
                            <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                            <p>&nbsp;</p>

                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{ $client[0]->company_name }}</strong></p>

                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>T.a.v. Dhr. {{ $client[0]->contact_person_first_name }} {{ $client[0]->contact_person_last_name }}</u>
                                <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_street }}, {{ $client[0]->company_number }}
                                <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_zip }}&nbsp; {{ $client[0]->company_city }}
                                <br />
                            </p>

                            <p>&nbsp;</p>

                            <p><strong>DELVERY DOCUMENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>

                            <table id="first-table" cellpadding="10" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <th style="width:95px">
                                            <p style="text-align: center;">DATE</p>
                                        </th>
                                        <th style="width:132px">
                                            <p style="text-align: center;">CUSTOMER V.A.T.-NUMBER</p>
                                        </th>
                                        <th style="width:113px">
                                            <p style="text-align: center;">INVOICE NUMBER</p>
                                        </th>
                                        <th style="width:142px">
                                            <p style="text-align: center;">CUSTOMER NUMBER</p>
                                        </th>
                                        <th style="width:236px">
                                            <p style="text-align: center;">PAYMENT CONDITIONS</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td style="height:35px; width:95px">
                                            <p style="text-align: center;">{{ date('d/m/y') }}</p>
                                        </td>
                                        <td style="height:35px; width:132px">
                                            <p style="text-align: center;">{{ $client[0]->vn }}</p>
                                        </td>
                                        <td style="height:35px; width:113px">
                                            <p style="text-align: center;">{{ substr($order[0]->order_reference_number, 4) }}</p>
                                        </td>
                                        <td style="height:35px; width:142px">
                                            <p style="text-align: center;">{{ $client[0]->client_reference_number }}</p>
                                        </td>
                                        <td style="height:35px; width:236px">
                                            <p style="text-align: center;">&nbsp; Netto 30 dagen na factuurdatum</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <p style="text-align: center;">&nbsp;</p>

                            <table id="second-table" cellpadding="10" cellspacing="0" width="100%">
                                <tbody>
                                    <tr class="second-table">
                                        <th style="width:85px">
                                            <p style="text-align: center;">QTY.</p>
                                        </th>
                                        <th style="width:406px">
                                            <p style="text-align: center;">DESCRIPTION</p>
                                        </th>
                                        <th style="width:114px">
                                            <p style="text-align: center;">COSTS PER PIECE</p>
                                        </th>
                                        <th style="width:114px">
                                            <p style="text-align: center;">TOTALPRICE</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td style="height:396px; width:85px">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                        <td style="height:396px; width:406px">
                                            <p style="margin-left: 40px;">Uw order nr.{{ $client[0]->company_number }}&nbsp;van {{ date('d/m/y') }} &nbsp;&agrave; {{ $client[0]->company_name }}</p>
                                            <p style="margin-left: 40px;">Onder dankzegging voor uw bestelling doen wij u hierbij de orderbevestiging toekomen. Wij zullen de levering volgens onderstaande specificatie en op de afgesproken leverdatum gereed hebben te </p>

                                            <p style="margin-left: 40px;">{{ $order[0]->order_subject }}</p>

                                            <!-- <p style="margin-left: 40px;">Artikelomschr. : Zuigerstang Aantal : 1 Afm./Gewicht : &oslash;65x518 &euro;&nbsp;</p> -->

                                            <p style="margin-left: 40px;"><u>Eventueel meerwerk wordt o.b.v. nacalculatie berekend</u></p>

                                            <p style="margin-left: 40px;">Prijzen : exclusief B.T.W. en in overeenstemming met gemaakte offerte en/of reeds eerder behandelde onderdelen.</p>

                                            <!-- <p style="margin-left: 40px;">Leverdatum : 7 maart 2018</p> -->

                                            <p style="margin-left: 40px;">Levering : af fabriek, conform bijlage leveringsvoorwaarden. Betaling : binnen 30 dagen netto.</p>

                                            <p style="margin-left: 40px;">Deze order is met zorg door ons en de door u verstrekte gegevens vastgesteld. Wilt u eventuele onjuistheden ons direct melden, zodat deze orderbevestiging mogelijk aangepast dient te worden.</p>

                                            <p style="margin-left: 40px;">Bedankt voor Uw opdracht.</p>

                                            <p style="margin-left: 40px;">Transport H/T ten Uwe laste.</p>

                                            <p style="margin-left: 40px;">&nbsp;</p>

                                            <p style="margin-left: 40px;">&nbsp;</p>

                                            <p style="margin-left: 40px;">&nbsp;</p>

                                            <p style="margin-left: 40px;">&nbsp;</p>

                                            <p style="margin-left: 40px;">&nbsp;</p>

                                            <p style="margin-left: 40px;">&nbsp;</p>

                                            <p style="margin-left: 40px;">&nbsp;</p>
                                        </td>
                                        <td style="height:396px; width:114px">
                                            <!-- <p style="margin-left: 40px;">&nbsp;</p>                                            -->
                                            @foreach(explode(',', $order[0]->order_price) as $_order_price)                                                 
                                            <p style="text-align: center;">{{ number_format($_order_price,2) }}&nbsp;&euro;</p>
                                            @endforeach                                              

                                        </td>
                                        <td style="height:396px; width:114px">
                                            <!-- <p style="margin-left: 40px; text-align: center;">&nbsp;</p> -->
                                            <?php $_order_amount = explode(',', $order[0]->order_amount); ?> 
                                            <?php $total = 0; ?>
                                            
                                            @foreach(explode(',', $order[0]->order_price) as $k=> $_order_price)                           
                                                <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>   
                                                <?php $total += $pxam; ?>  
                                                <p style="text-align: center;">{{ number_format($pxam,2) }} &euro;</p>
                                            @endforeach                                           



                                        </td>
                                    </tr>
          
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <p style="margin-left: 40px; text-align: right;">SUBTOTAL&nbsp;</p>
                                            </td>
                                            <td>
                                            <p style="text-align:center">{{ number_format($total,2) }} &euro;</p>
                                        </td>
                                    </tr>

                                    <?php $percentage = (ucfirst(strtolower($data['company_country'])) =="Belgium")? 21: 0; ?>
                                    <?php $total_vat = ($percentage / 100) * $total; ?>
                               
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <p style="margin-left: 40px; text-align: right;">B.T.W.&nbsp; {{$percentage}}%</p>
                                            </td>
                                            <td>
                                            <p style="text-align:center">{{ number_format($total_vat,2) }}  &euro;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <p style="margin-left: 40px; text-align: right;">TOTAL&nbsp;</p>
                                            </td>
                                            <td>
                                            <p style="text-align:center"><strong>{{ number_format($total + $total_vat, 2) }} &euro;</strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div>
                                <p><strong>Gelieve deze ORDERBEVESTIGING voor akkoord&nbsp; ondertekend te willen teurgsturen via fax : 09/3558330</strong></p>
                            </div>

                            <p>&nbsp;</p>

                            <p>&nbsp;</p>

                        </textarea>
                        <!-- CKEditor  !-->

                    </form>

                </div>
            </div>
            <!-- /.8 -->
        </div>
        <!-- /.row-->
    </div>
</div> 
<!-- /.container-->
<script>
  (function()
  {
    if( window.localStorage )
    {
      if( !localStorage.getItem('firstLoad') )
      {
        localStorage['firstLoad'] = true;
        window.location.reload();
      }  
      else
        localStorage.removeItem('firstLoad');
    }
  })();
    
  window.onunload = refreshParent;
  function refreshParent() {
      window.opener.location.reload();
  }
</script>
@endsection