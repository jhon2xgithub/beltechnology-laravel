@extends('layouts.mainpdf')
@section('content')
<div class="container">
<div class="row">
   <div class="col-lg-12">
      <br/>
      <br/>
      <span style="color:#fefefe;">resources\views\quotation\sixSevenEight\generate-quotation-request.blade.php</span>
      <ul class="nav nav-tabs ul-center" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE SUPPLIER CONFIRMATION</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#home" role="tab">SEND EMAIL TO SUPPLIER</a>
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
            </div> 

            <!-- fr -->
            <div id="fr">
            </div>
              
            <!-- nl -->
            <div id="nl"> 
              <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                 <input type="hidden"  name="filename"     value="Order confirmation to supplier" />   
                 <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">

                              <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                              <p>&nbsp;</p>

                              @if($supplier[0]->supplier_exclusivity_status == 1)

                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $supplier[0]->supplier_name }}</strong></p>

                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>T.a.v. Dhr.  {{ $supplier[0]->contact_lastname }}
                                </u>
                                <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_street }}, {{ $supplier[0]->supplier_number }}
                                <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_zip }},{{ $supplier[0]->supplier_city }}
                                <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_country }}</p>

                                <p>&nbsp;</p>

                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/y') }}</p>

                                <p><strong><u>ORDERBEVESTIGING&nbsp; :</u></strong>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                                <p>Beste, {{ $supplier[0]->contact_first_name }}</p>

                                <p><u>Betrifft:</u>&nbsp;&nbsp; {{ $supplier[0]->contact_lastname }}&nbsp; &nbsp;{{ $supplier[0]->supplier_city }}&nbsp; {{ $supplier[0]->supplier_country }}&euml;</p>

                                <p>Graag bevestigen wij u ons order voor het <strong>{{ $order[0]->order_subject }}</strong>&nbsp;van de werkstukken zoals navolgend beschreven.</p>

                                <p>&nbsp;</p>

                                <p>Het <strong>{{ $order[0]->order_subject }}</strong> &nbsp;en finishen&nbsp; van :</p>

                                <?php $amount = explode(',',$order[0]->order_amount); ?>
                                <?php //$price = explode(' ',$order[0]->order_price); ?>
                                <?php $order_dimensionweight = explode(',',$order[0]->order_dimensionweight); ?>
                                <?php $order_material = explode(',',$order[0]->order_material); ?>
                                <?php $price = explode(',',$order[0]->order_price); ?>

                                <?php $total = 0; ?>
                                @foreach(explode(',',$order[0]->order_product) as $key => $product)
                                <ul>

                                    <li>{{ $amount[$key] }} &nbsp; Stuks {{ $product }}</li>
                                    <li>Material: {{ $order_material[$key] }}</li>
                                    <li>Afmetingen:&nbsp;{{ $order[0]->order_dimensionweight }}</li>

                                </ul>
                                <p style="margin-left: 40px;">
                                    Prijs :&nbsp; &nbsp; &nbsp;{{ number_format($price[$key], 2) }}&nbsp;&euro;/stuk.
                                    <br/>
                                </p>
                                @endforeach

                                <p style="margin-left: 40px;">Uw offerte nr; {{ $order[0]->order_number_from_supplier }}</p>

                                <p><strong>Wij danken u voor een snelle levering aan </strong>:&#39;</p>

                                <p style="margin-left:40px"><strong>{{ $client[0]->company_name }}</strong>
                                <br />
                                <strong>{{ $client[0]->company_street }}</strong>&nbsp;<strong>, {{ $client[0]->company_number }}</strong><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ref. nr. {{ $client[0]->client_reference_number }}</strong>
                                <br />
                                <strong>{{ $client[0]->company_zip }}&nbsp; </strong>&nbsp;<strong>{{ $client[0]->company_city }}</strong></p>

                                <p>Met vriendelijke groeten.

                                <br/><strong>Bel-Technologies nv.</strong>

                                <br/>Peter van Belle</p>

                              @else

                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $supplier[0]->supplier_name }}</strong></p>

                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>T.a.v. Dhr.  {{ $supplier[0]->contact_lastname }}</u>
                                    <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_street }}, {{ $supplier[0]->supplier_number }}
                                    <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_zip }},{{ $supplier[0]->supplier_city }}
                                    <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_country }}</p>

                                <p>&nbsp;</p>

                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/y') }}</p>

                                <p><strong><u>ORDERBEVESTIGING&nbsp; :</u></strong>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                                <p>Beste, {{ $supplier[0]->contact_first_name }}</p>

                                <p><u>Betrifft:</u>&nbsp;&nbsp; <strong>BEL-TEC</strong>HNOLOGIES nv/sa Lochristi Belgi&euml;.</p>

                                <p>Graag bevestigen wij u ons order voor het <strong>{{ $order[0]->order_subject }}</strong>&nbsp;van de werkstukken zoals navolgend beschreven.</p>

                                <p>&nbsp;</p>

                                <p>Het <strong>{{ $order[0]->order_subject }}</strong> &nbsp;en finishen&nbsp; van :</p>

                                <?php $amount = explode(',',$order[0]->order_amount); ?>
                                <?php $price = explode(',',$order[0]->order_price); ?>
                                <?php $order_dimensionweight = explode(',',$order[0]->order_dimensionweight); ?>
                                <?php $order_material = explode(',',$order[0]->order_material); ?>
                                <?php $prices = explode(' ',$order[0]->order_price); ?>

                                <?php $total = 0; ?>
                                <?php $x = 0;?>
                                @foreach(explode(',',$order[0]->order_product) as $key => $product)
                                  <?php $count = $x++; ?>
                                  <ul>

                                      <li>{{ $amount[$key] }} &nbsp; Stuks {{ $product }}</li>
                                      <li>Material: {{ $order_material[$key] }}</li>
                                      <li>Afmetingen:&nbsp;{{ $order[0]->order_dimensionweight }}</li>

                                  </ul>
                                  <p style="margin-left: 40px;">
                                      Prijs :&nbsp; &nbsp; &nbsp; &nbsp; {{ $price[$key] }}&nbsp;&euro;/stuk.
                                      <br/>
                                  </p>
                                @endforeach

                                <p style="margin-left: 40px;">Uw offerte nr; {{ $order[0]->order_number_from_supplier }}</p>

                                <p><strong>Wij danken u voor een snelle levering aan </strong>:&#39;</p>

                                <p style="margin-left:40px"><strong>BEL</strong><strong>-</strong>TECHNOLOGIES nv/sa
                                <br /> Rapaartakkerlaan 17-19<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ref. nr. {{ $order[0]->order_reference_number }}</strong>
                                <br /> B-9080 Lochristi I Belgium</p>

                                <p>Met vriendelijke groeten.

                                <br/><strong>Bel-Technologies nv.</strong>

                                <br/>Peter van Belle</p>

                              @endif

                          </textarea>
                 <!-- CKEditor  !-->
              </form>
            </div>

            <!-- de -->
            <div id="de">    
              <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
                 <input type="hidden"  name="filename"     value="Order confirmation to supplier" />   
                 <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">

                      <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                      <p>&nbsp;</p>

                      <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>TFE-LOK&nbsp; P. SCHREIBER&nbsp; GmbH.</strong></p>

                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Z.hd. von Herrn GOLLNIK</u><br />
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kronprinzenstrasse, 122 a<br />
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D-40217&nbsp; D&uuml;sseldorf<br />
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DUITSCHLAND.</p>

                      <p>&nbsp;</p>

                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PvB/17.517/B17013&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 02/12/2017</p>

                      <p><strong><u>AUFTRAGSBEST&Auml;TIGUNG</u></strong> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</p>

                      <p><strong>BEL-TECHNOLOGIES NV.</strong></p>

                      <p><strong>UST&nbsp; BE 451.330.013</strong></p>

                      <p>&nbsp;</p>

                      <p>REF.&nbsp;&nbsp; &nbsp;<strong>A.E.I.</strong> - <strong>A.T.M.P.&nbsp; sa.&nbsp; </strong></p>

                      <p><u>Betrifft:</u>&nbsp;&nbsp; TFE-LOK-beschichtung</p>

                      <p>Wir&nbsp; best&auml;tigen Ihnen hiermit unseren Auftrag&nbsp; f&uuml;r TFE-LOK&reg; behandelung von :</p>

                      <ul>
                        <li>34 St&uuml;ck &quot;Obturateur&quot;&nbsp; laut zeichn. Nr. E100009530</li>
                        <li>Materiaal :&nbsp; Va-Stahl &nbsp;&nbsp;X2CrNiMO 17-13-2&nbsp;&nbsp; VA-STAHL 316 L</li>
                        <li>Ma&szlig;e :&nbsp; AD 18 -0,02/-0,03 x 81,5 mm.&nbsp; .&nbsp;</li>
                        <li>Totall&auml;nge 387</li>
                      </ul>

                      <p>&nbsp;</p>

                      <p><u>Bearbeitung :&nbsp;&nbsp; </u></p>

                      <ul>
                        <li>Vorma&szlig; prufen und eventuel vorschleiffen</li>
                        <li>Hartverchromen mit verbleibende Cr-schicht von min.&nbsp;&nbsp; <strong>100&nbsp;&nbsp; &micro;m.</strong></li>
                        <li>Ma&szlig;-Schleiffen laut zeichn. Und Finischen auf Ra 0,2</li>
                      </ul>

                      <ul>
                        <li>Tfe-Lok behandelung.</li>
                      </ul>

                      <p>&nbsp;</p>

                      <p style="margin-left:56.25pt;"><u>Preis :&nbsp;&nbsp;&nbsp; &nbsp;&euro;/st. Wie &uuml;blig</u></p>

                      <p style="margin-left:56.25pt;">&nbsp;</p>

                      <p style="margin-left:56.25pt;"><strong><u>LIEFETERMIN &nbsp;19/12/2017</u></strong></p>

                      <p><u>Wenn fertig bitte per&nbsp; TNT Standard wierder zur&uuml;ck an.</u></p>

                      <p><strong>A.E.I.&nbsp;&nbsp; A.T.M.P.&nbsp; SA.</strong><br />
                      Rue Armand Busquet<br />
                      F-14400&nbsp; Bayeux&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; REF/7539&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TEL: 0231518775<br />
                      Franckreich.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UST : FR80533874863&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mr. D Yonnet</p>

                      <p><u>Liefertermin :&nbsp; </u>&nbsp;&nbsp;&nbsp;&nbsp;Teilen m&uuml;&szlig;en wieder beim Kunde sein Sp&auml;testens am 20/12/2017 sehr eilig?&nbsp; Wenn nicht machbahr bitte telefonisch bescheid geben an Bel-tec.</p>

                      <p><strong>BEL-TEC</strong>HNOLOGIES NV.<br />
                      Peter van Belle</p>

                      


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
        
            <form name=f1 id="post-generate-quotation-request-form" method="post" action="{{ url('/post-send-confirmation-to-supplier') }}" role="form" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$data['order_id']}}">
               <div class="messages"></div>
               <div class="row">
                  <div class="form-group col-sm-12">
                     <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name" value="{{ $data['supplier_name'] }}" placeholder="Name">
                  </div>
                  <div class="form-group col-sm-12">
                  
                    <?php 
                      $emails = explode(',',$supplier[0]->contact_person_email);
                      $emails[] = $data['supplier_email'];
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
                           <input type="file" name="attachment[]" class="form-control-file" id="attachment" aria-describedby="fileHelp" />
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
<!-- /.container-->
@endsection