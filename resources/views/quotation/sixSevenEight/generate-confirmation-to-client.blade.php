@extends('layouts.mainpdf')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <br/>
            <br/>
            <span style="color:#fefefe;">resources\views\quotation\sixSevenEight\generate-confirmation-to-client.blade.php</span>
            <ul class="nav nav-tabs ul-center" role="tablist">
        
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE CLIENT CONFIRMATION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link home_tab" data-toggle="tab" href="#home"  role="tab">SEND EMAIL TO CLIENT</a>
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
                        
                        <input type="hidden"  name="filename"     value="Order confirmation to client" />               

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
                                            <?php //print_r($_order_amount); ?>
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
                        
                    <!-- fr -->    
                    <div id="fr">
                        <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                        
                        <input type="hidden"  name="filename"     value="Order confirmation to client" />               

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
                                            <?php //print_r($_order_amount); ?>
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

                    <!-- nl -->
                    <div id="nl">
                        <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                        
                        <input type="hidden"  name="filename"     value="Order confirmation to client" />               

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
                                            <?php //print_r($_order_amount); ?>
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

                    <!-- de -->
                    <div id="de">
                        <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                        
                        <input type="hidden"  name="filename"     value="Order confirmation to client" />               

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
                                            <?php //print_r($_order_amount); ?>
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

                <div class="tab-pane" id="home" role="tabpanel">

                    <br/>

                    <div class="alert alert-danger form-error-msg" style="display:none;">
                        <ul></ul>   
                    </div>

                    <p>Sends confirmation to supplier</p>

                    <form name=f1 id="post-generate-quotation-request-form" method="post" action="{{ url('/post-generate-client-confirmation') }}" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{$data['order_id']}}">
                        <div class="messages"></div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name" value="{{ $data['company_name'] }}" placeholder="Name">
                            </div>
                            <div class="form-group col-sm-12">


                                <!-- <input type="email" placeholder="Email" class="form-control" id="email" name="email" value="{{ $data['company_email'] }}" placeholder="Email"> -->


                                <?php 
                                  $emails = explode(',',$client[0]->contact_person_email);
                                  $emails[] = $data['company_email'];
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
            <!-- /.8 -->
        </div>
        <!-- /.row-->
    </div>
</div> 
<!-- /.container-->
<script type="text/javascript">
var myForm = $("#post-generate-quotation-request-form_");


// var input = document.createElement('input');
// input.type="file";
// input.value="D:\ONE-DRIVE\Documents\M-DIGITALBAKERY\Metallics Client List.pdf";
// myForm.appendChild(input);    
$(document).ready(function(){
    // $('input:file').val("D:\ONE-DRIVE\Documents\M-DIGITALBAKERY\Metallics Client List.pdf");
    // $("[type='file']").val("D:\ONE-DRIVE\Documents\M-DIGITALBAKERY\Metallics Client List.pdf");

});
</script>

@endsection