@extends('layouts.mainpdf')

@section('content')
<div class="container">

    <div class="row">




        <div class="col-lg-12">



            <br/>
            <br/>

            <ul class="nav nav-tabs ul-center" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE QUOTE LETTER FOR CLIENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home" role="tab">SEND EMAIL TO CLIENT</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

              <div class="tab-pane active" id="profile" role="tabpanel">

                        <br/>
                            <br/>


                            <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                                <input type="hidden"  name="filename"     value="Quotation for client" />

                                <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">

                                  <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{$client[0]->company_name}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><u>T.a.v. {{ $client[0]->contact_person_first_name }}</u></strong><br />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$client[0]->company_street}},&nbsp; {{$client[0]->company_number}}<br />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$client[0]->company_zip}}&nbsp; {{$client[0]->company_city}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                                  <p>&nbsp;</p>

                                  <p>&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/y') }}</p>

                                  <p><strong><u>OFFERTE&nbsp; :</u> {{ $order[0]->order_number_from_supplier }}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                                  <p>Geachte</p>

                                  <p><u>Betreft :</u>&nbsp;&nbsp; {{ $order[0]->order_subject }}</p>

                                  <p>Wij danken U voor Uw uw prijsaanvraag van {{ date('d/m/y') }} voor het <strong><u>{{ $order[0]->order_subject }} </u></strong>,&nbsp; en hebben het genoegen U hierbij onze offerte toe te sturen&nbsp;</p>

                                  <p>Op werkstukken door u aan te leveren, onder voorbehoud van controle, werkstukken klaar voor behandeling, en voorzien van een voor u ideale oppervlaktegesteldheid,&nbsp; vrij van vervuiling, beschadigingen en oli&euml;n.</p>

                                  <p><strong><u>Het {{ $order[0]->order_subject }}</u></strong></p>

                                  <ul>

                                    <?php $order_details = explode(',',$order[0]->order_details); ?>
                                    @foreach($order_details as $key => $order_details)
                                      <li>{{ $order_details }}</li>
                                    @endforeach
                                  </ul>

                                  <ul>
                                    <?php $amount = explode(',',$order[0]->order_amount); ?>
                                    <?php $price = explode(' ',$order[0]->order_price); ?>
                                    <?php $order_dimensionweight = explode(',',$order[0]->order_dimensionweight); ?>
                                    <?php $order_material = explode(',',$order[0]->order_material); ?>
                                    <?php $order_price = explode(',',$order[0]->order_price); ?>

                                    <?php $total = 0; ?>
                                    @foreach(explode(',',$order[0]->order_product) as $key => $product)

                                      <li>Omschrijving : {{ $amount[$key] }} {{ $product }}</li>
                                      <li>Materiaal:  {{ $order_material[$key] }} </li>
                                      <li>Afm./Gewicht : &nbsp;{{ $order_dimensionweight[$key] }}&nbsp;&nbsp;&nbsp;&nbsp; voor de
                                        <strong>Stuksprijs van : </strong>&nbsp;<strong><u>{{ number_format($order_price[$key],2) }} &euro;/st.</u></strong>
                                      </li>

                                    @endforeach
                                  </ul>

                                  <p style="margin-left:40px">Transport {{ $order[0]->transport_company }} door onze zorgen : +- {{ $order[0]->transport_price }} &euro;</p>

                                  <p><u>Technische details:</u><br />

                                  <?php $order_technicaldetails = explode(',', $order[0]->order_technicaldetails); ?>

                                  @foreach($order_technicaldetails as $order_technicaldetail)
                                      {{ $order_technicaldetail }}<br/>
                                  @endforeach
                                  </p>

                                  <p>Onze prijzen zijn Netto,&nbsp; exclusief BTW.&nbsp; verpakking en transport,&nbsp;&nbsp; geldig 2 maand en voor de vooropgestelde hoeveelheid en behandeling. Prijzen, op basis van bovengenoemde aantallen en afmetingen in &eacute;&eacute;n opdracht en aanlevering.</p>

                                  <p><u>Levertijd</u>: volgens afspraak,&nbsp; {{ $order[0]->delivery_time }}<br />
                                  <u>Betalingscondities </u>: Netto,&nbsp; 30 dagen na factuurdatum.<br />
                                  <u>Algemene voorwaarden</u> : enkele onze algemene voorwaarden zijn van toepassing, bij order aanvaard de klant.<br />
                                  Wij vertrouwen erin u hiermede van dienst te zijn geweest en houden ons voor uw gewaardeerde opdracht beleefd aanbevolen.</p>

                                  <p>Met vriendelijke groeten.<br />
                                  <strong>Bel-TECHNOLOGIES NV.</strong><br />
                                  Peter Van Belle</p>



                                </textarea> <!-- CKEditor  !-->


                            </form>


              </div>

              <div class="tab-pane" id="home" role="tabpanel">


                  <br/>


                  <div class="alert alert-danger form-error-msg" style="display:none;">
                      <ul></ul>
                  </div>

                  <p>Sends request quotation to client</p>

                  <form name=f1 id="post-generate-quotation-request-form" method="post" action="{{url('/post-generate-quotation-request')}}" role="form" enctype="multipart/form-data">
                      {{ csrf_field() }}


                      <input type="hidden" name="id" value="{{$data['order_id']}}">
                      <div class="messages"></div>

                      <div class="row">
                          <div class="form-group col-sm-12">
                              <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name"  value="{{ $data['company_name'] }}" placeholder="Name" >
                          </div>
                          <div class="form-group col-sm-12">

                              <input type="email" placeholder="Email" class="form-control" id="email" name="email"  value="{{ $data['company_email'] }}" placeholder="Email" >
                          </div>
                          <div class="form-group col-sm-12">

                              <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject"  value="" placeholder="Subject" >
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

