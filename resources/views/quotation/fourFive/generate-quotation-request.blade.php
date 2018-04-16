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

                      <input type="hidden"  name="filename"     value="Quotation for client" />

                      <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">

                        <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                        <p style="margin-left:2.95in;"><strong>{{$client[0]->company_name}} </strong></p>

                        <p style="margin-left:2.95in;"><u>Attn. Mr. {{ $client[0]->contact_person_first_name }} {{ $client[0]->contact_person_last_name }}</u><br/>
                        {{$client[0]->company_street}}<br/>
                        {{$client[0]->company_zip}}&nbsp;&nbsp; {{$client[0]->company_city}}<br/>
                        {{$client[0]->company_country}}</p>

                        <p style="margin-left:247.5pt;">&nbsp;</p>

                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/y') }}</p>

                        <p><strong><u>QUOTATION :</u></strong></p>

                        <p>Dear Mr {{ $client[0]->contact_person_last_name }},</p>

                        <p>We thank you for your inquiry for the treatment of &nbsp;Thrust Tubes dated by email&nbsp; DD. 01/04/2018,&nbsp; and are pleased to quote you as follows :&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</p>

                        <ol>
                          <li><strong><u>Hard -Inchromizing :&nbsp; No additional layer but Diffusion Hardnes&nbsp; 2.200 -2.400 HV 0,025</u></strong></li>
                        </ol>

                        <ul>
                          <li>Pre-treatment Plasma Carbonising + (finishing)</li>
                          <li>Hard-Inchromizing by Chrome-Diffusion&nbsp; HV 2.200 &ndash; 2.400</li>
                          <li>Finishing</li>
                        </ul>
                        <!-- 
                        <p>Thrust Tubes 5V256<br/>
                        Dim. : &oslash; 65x227mm<br/>
                        <strong>Price </strong>:&nbsp; 1 off&nbsp; 326,25 &euro;/p.&nbsp;&nbsp; &nbsp; 5 off : 282,75 &euro;/p&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10 off : 221,00 &euro;/p&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20 off&nbsp;&nbsp;&nbsp;&nbsp; :163,00 &euro;/p</p>
                        -->

                        <?php $amount = explode(',',$order[0]->order_amount); ?>
                        <?php $price = explode(' ',$order[0]->order_price); ?>
                        <?php $order_dimensionweight = explode(',',$order[0]->order_dimensionweight); ?>
                        <?php $order_material = explode(',',$order[0]->order_material); ?>
                        <?php $order_price = explode(',',$order[0]->order_price); ?>

                        <?php $total = 0; ?>
                        @foreach(explode(',',$order[0]->order_product) as $key => $product)

                          <p>{{ $product }}<br/>
                          Dim. : &oslash; {{ $order_dimensionweight[$key] }}<br/>
                          <strong>Price </strong>:&nbsp; 1 off&nbsp; 326,25 &euro;/p.&nbsp;&nbsp; &nbsp; 5 off : 282,75 &euro;/p&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10 off : 221,00 &euro;/p&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20 off&nbsp;&nbsp;&nbsp;&nbsp; :163,00 &euro;/p</p> 

                          <!-- <li>Omschrijving : {{ $amount[$key] }} {{ $product }}</li>
                          <li>Materiaal:  {{ $order_material[$key] }} </li>
                          <li>Afm./Gewicht : &nbsp;{{ $order_dimensionweight[$key] }}&nbsp;&nbsp;&nbsp;&nbsp; voor de
                            <strong>Stuksprijs van : </strong>&nbsp;<strong><u>{{ number_format($order_price[$key],2) }} &euro;/st.</u></strong>
                          </li> -->

                        @endforeach
                       

                        <p>Combination of several type of tubes in one order can also give positive influence on the price. <u>Delivery</u> :&nbsp; {{ $order[0]->delivery_time }}<br />
                        <u>Conditions</u> : payment, &nbsp;Net 20 days after date of Invoice.<br />
                        <u>General conditions :</u>&nbsp; only our general conditions apply, by an order the customers agrees.<br />
                        <u>Dimensions :</u>&nbsp; as on drawing in addition</p>

                        <p>VAT, Taxes, transport and packaging is not included in the price above and are at your charge.<br />
                        Prices remain active for 2 months.</p>

                        <p>Please advice your acceptance for the above with your official order coverage as soon as possible.</p>

                        <p>For your courtesy and kind reply in advance our appreciative thanks.<br />
                        Best regards<br />
                        <strong>BEL-TEC</strong>HNOLOGIES SA.<br />
                        Peter van Belle</p>



                      </textarea> <!-- CKEditor  !-->
                  </form>
                </div>

                <!-- fr -->  
                <div id="fr">  
                  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                      <input type="hidden"  name="filename"     value="Quotation for client" />

                      <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">

                        <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>MOLDING FRANCE SA</strong></p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>A l&#39;attn. de MME. BERRIGAUD</u><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ZA de Tr&eacute;huinec&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; F- 56890&nbsp; Plescop<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FRANCE.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PvB/17.591/P1801&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 05/04/2018</p>

                        <p><strong><u>OFFRE DE PRIX :</u></strong></p>

                        <p>Madame,</p>

                        <p>Faisant suite &agrave; votre demande de prix&nbsp; par mail du 05/04/2018,&nbsp; pour le traitement TFE-LOK&reg;&nbsp; de vos Obturateurs suivant vos plans,&nbsp; nous pouvons vous offrir ce qui suit.</p>

                        <p>Sur pi&egrave;ces de votre fourniture,&nbsp; sous r&eacute;serves de contr&ocirc;le,&nbsp; pi&egrave;ces pr&ecirc;tes aux traitements, d&eacute;j&agrave; pourvus d&#39;un &eacute;tat de surface pour vous id&eacute;al,&nbsp; sans traces de corrosion ou pollution.</p>

                        <p>&nbsp;</p>

                        <ul>
                          <li>32 &quot; Obturateurs&quot;&nbsp;&nbsp; suivant votre plan nr. E100009530</li>
                          <li>Dimensions :&nbsp; OD 18 -0,002/-0,003 x 81,5 mm.&nbsp; &nbsp;x&nbsp; 387</li>
                          <li>Mati&egrave;re :&nbsp; Acier inoxydable&nbsp; Z2CN1810</li>
                        </ul>

                        <p><u>Notre traitement :</u></p>

                        <ul>
                          <li>Contr&ocirc;le des pi&egrave;ces avant traitement</li>
                        </ul>

                        <ul>
                          <li>Activation de surfaces &agrave; traiter.</li>
                          <li>Chromage dur en sur&eacute;paisseur avec couche finale de min.&nbsp; 100&nbsp; &micro;m</li>
                          <li>Rectification suivant plan</li>
                          <li>Traitement TFE-LOK&reg;</li>
                          <li>Controle final</li>
                        </ul>

                        <p style="margin-left:35.25pt;">Pour le prix de :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>400,00 &euro;/pi&egrave;ce </strong></p>

                        <p style="margin-left:35.25pt;">&nbsp;</p>

                        <p><u>REMARQUES :</u></p>

                        <ul>
                          <li>La parrallellit&eacute; des pi&egrave;ces doit &ecirc;tre d&eacute;j&agrave; suivant le plan =&lt; 0,02 mm.</li>
                          <li>Nous livrer les pi&egrave;ces avec les zones &agrave; traiter avec une sous c&ocirc;te de 2/10 mm. Au diam&egrave;tre et une finition min. Ra 0,2 &nbsp;&nbsp;</li>
                          <li>Les pi&egrave;ces doivent avoir deux points de centre.</li>
                        </ul>

                        <p><u>D&eacute;lai de livraison</u> : 2 -3 &nbsp;semaines.<br />
                        <u>Conditions de paiement</u> :&nbsp; -2% avant exp&eacute;dition, net &agrave; 30 jours et +2 % &agrave; 60 jours de la date de la facture.&nbsp; Nous confirmer votre choix avec la commande.<br />
                        <u>Conditions g&eacute;n&eacute;rales</u>&nbsp;:&nbsp; seuls nos conditions sont d&rsquo;application, par une commande le client accepte.</p>

                        <p>Nos prix sont unitaires hors taxes, transports et emballages en sus, valables 2 mois et pour la quantit&eacute;s des pi&egrave;ces sus mentionn&eacute;es.<br />
                        En attendant une suite favorable,&nbsp; et toujours &agrave; votre disposition.<br />
                        Meilleures salutations.<br />
                        <strong>BEL-TEC</strong>HNOLOGIES NV.<br />
                        Peter van Belle</p>


                        
                      </textarea> <!-- CKEditor  !-->
                  </form>
                </div>

                <!-- nl -->  
                <div id="nl">  
                  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                      <input type="hidden"  name="filename"     value="Quotation for client" />

                      <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">

                        <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                      
                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>&nbsp; ARCELOR-MITTAL GEEL</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>T.a.v. Dhr. Peter Wuyts</u><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lammerdries,&nbsp; 10&nbsp; Ind Z. Geel-West<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; B-2440&nbsp; Geel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp; PvB/18.369/A1701&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 11/12/2017</p>

                        <p><strong><u>OFFERTE&nbsp; :</u></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                        <p>Geachte</p>

                        <p><u>Betreft :</u>&nbsp;&nbsp; TEFLON-coaten van lekpannen</p>

                        <p>Wij danken U voor Uw uw prijsaanvraag van 11/12 voor het <strong><u>TEFLON-COATEN </u></strong>van lekpannen,&nbsp; en hebben het genoegen U hierbij onze offerte toe te sturen :</p>

                        <p>Op werkstukken door u aan te leveren, onder voorbehoud van controle, werkstukken klaar voor behandeling, en voorzien van een voor u ideale oppervlaktegesteldheid,&nbsp; vrij van vervuiling, beschadigingen en oli&euml;n.</p>

                        <p><strong><u>Het TEFLON-COATEN </u></strong></p>

                        <ul>
                          <li>Reinigen/ontvetten en activeren</li>
                          <li>1 Laag Primer + thermisch uitharden</li>
                          <li>2 Lagen TEFLON BELOLEASE &nbsp;EC 004&nbsp;&nbsp;&nbsp;</li>
                          <li>Thermisch Uitharden</li>
                          <li>Eindcontrole</li>
                        </ul>

                        <ul>
                          <li>Omschrijving : 1 aflekpan</li>
                          <li>Materiaal: Alu 6061</li>
                          <li>Afm./Gewicht : &nbsp;1.930 x 840 x 135 mm&nbsp;&nbsp;&nbsp;&nbsp; voor de <strong>Stuksprijs van : </strong>&nbsp;<strong><u>1.988,00 &euro;/st.</u></strong></li>
                        </ul>

                        <p style="margin-left:.25in;">Transport H/T door onze zorgen : +- 185,00 &euro;</p>

                        <p>&nbsp;</p>

                        <p><u>Technische details:</u><br />
                        Laagdikte :&nbsp; 60 -80 &micro;m&nbsp; &ldquo;allround&rdquo;&nbsp; (met uitzondering van onderzijde)<br />
                        Kleur :&nbsp; zwart<br />
                        Elektrostatische geleiding : &lt; 106 &Omega;<br />
                        Specifiek voor lijmen en lakken die licht ontvlambaar zijn.</p>

                        <p>Onze prijzen zijn Netto,&nbsp; exclusief BTW.&nbsp; verpakking en transport,&nbsp;&nbsp; geldig 2 maand en voor de vooropgestelde hoeveelheid en behandeling. Prijzen, op basis van bovengenoemde aantallen en afmetingen in &eacute;&eacute;n opdracht en aanlevering.</p>

                        <p><u>Levertijd</u>: volgens afspraak,&nbsp; min. 2 weken.<br />
                        <u>Betalingscondities </u>: Netto,&nbsp; 30 dagen na factuurdatum.<br />
                        <u>Algemene voorwaarden</u> : enkele onze algemene voorwaarden zijn van toepassing, bij order aanvaard de klant.<br />
                        Wij vertrouwen erin u hiermede van dienst te zijn geweest en houden ons voor uw gewaardeerde opdracht beleefd aanbevolen.</p>

                        <p>Met vriendelijke groeten.<br />
                        <strong>Bel-TECHNOLOGIES NV.</strong><br />
                        Peter Van Belle</p>


                      </textarea> <!-- CKEditor  !-->
                  </form>
                </div>

                <!-- de -->  
                <div id="de">  
                  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                      <input type="hidden"  name="filename"     value="Quotation for client" />

                      <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">

                        <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                        <p style="margin-left:2.95in;"><strong>FLOWTRONIC PUMPS LTD. </strong><br />
                        <u>Attn. Mr. Michel Kenis</u><br />
                        Brighton Road<br />
                        RH175NA&nbsp;&nbsp; West Sussex<br />
                        BELGIUM</p>

                        <p style="margin-left:247.5pt;">&nbsp;</p>

                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;PvB/18.677/1801&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 13/04/18</p>

                        <p><strong><u>QUOTATION :</u></strong></p>

                        <p>Sehr geehrter Herr Kenis,</p>

                        <p>Wir danken Verbindlich f&uuml;r Ihre Anfrage und offerieren Ihnen unter Zugrundlegung unserer Zahlungs- und Lieferbedingungen :</p>

                        <p>Auf teilen von Ihnen an zu liefern, nach Kontrolle bei uns, teilen fertig zur Behandlung mit eine f&uuml;r Ihnen optimale Oberfl&auml;cheng&uuml;te, frei von allen Fremtschichten, Verunreinigungen, Korrosion und Restsp&auml;ne, in Verpackungen, die sich zum innerbetrieblichen und zum R&uuml;cktransport eignen anzuliefern.</p>

                        <ul>
                          <li>1-4 St&uuml;ck Kernen laut Zeichnung Bm54082-FT-5&nbsp;&nbsp; und Bm54072-FT</li>
                          <li>Material : St.37&nbsp; als Aktuelles Grundmaterial.</li>
                          <li>Ma&szlig;e : &nbsp;37 x 21 x 15&nbsp; und&nbsp; 37,5 x 25,6 x 17 mm.</li>
                        </ul>

                        <p><strong><u>1. Das Hart-Inchromieren (CM3002)&nbsp; durch Chrom-Diffusionsverfahren</u></strong></p>

                        <p>Oberfl&auml;chenh&auml;rte :&nbsp; 2.000 &ndash; 2.400 HV.&nbsp; 0,025<br />
                        Schichttiefe :15 &ndash; 30 &micro;m (abh&auml;ngig vom C-Gehalt)<br />
                        Werkstoff : St37<br />
                        Ma&szlig;en :&nbsp; <u>Toleranzen &lt; 0,02 sind nicht zu Garantieren.</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Zum Preis von : <strong><u>170,00 &euro; gesamtpreis</u></strong><br />
                        <strong><u>Anmerkung:</u></strong> Wir Empfehlen 1.2379 Stahl als Grundmaterial wobei wir auch noch&nbsp; Nachh&auml;rten K&ouml;nnen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><strong><u>2. Das Vanadieren (CM7004)&nbsp; durch Vanadium-Diffusionsverfahren</u></strong><br />
                        Oberfl&auml;chenh&auml;rte :&nbsp; 2.500 &ndash; 3.800 HV.&nbsp; 0,025<br />
                        Schichttiefe :15&nbsp; &micro;m (abh&auml;ngig vom C-geh&auml;lt)<br />
                        Werkstoff : St37<br />
                        Ma&szlig;en :&nbsp; <u>Toleranzen &lt; 0,02 sind nicht zu Garantieren.</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Zum Preis von : <strong><u>600,00 &euro; gesamtpreis</u></strong><br />
                        <strong><u>Anmerkung:</u></strong> Wir Empfehlen 1.2343 oder 1.2344 Stahl als Grundmaterial wobei wir auch noch&nbsp; Nachh&auml;rten K&ouml;nnen&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><strong><u>2. Das CVD HARDTEC&reg;&nbsp; beschichten mit Wolfram-Carbid</u></strong><br />
                        Oberfl&auml;chenh&auml;rte :&nbsp; 3.800&nbsp; - 4.000 HV.&nbsp; 0,025<br />
                        Schichtdicke<br />
                        Werkstoff : St37<br />
                        Ma&szlig;en :&nbsp; <u>Toleranzen &lt; 0,02 sind nicht zu Garantieren.</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Zum Preis von : <strong><u>150,00 &euro;/st.</u></strong><br />
                        <strong><u>Anmerkung:</u></strong> Wir Empfehlen eine geh&auml;rte Kern aus 1.2379</p>

                        <p>Jegliche W&auml;rmebehandlung werden von uns mit gr&ouml;&szlig;ter Sorgfalt und den geeignetsten und modernsten Mitteln ausgef&uuml;hrt. F&uuml;r die Ausf&uuml;hrung unserer Arbeiten gelten auch zus&auml;tzlich die &quot;Allgemeine Gesch&auml;ftsbedingungen f&uuml;r Lohn-W&auml;rmebehandlungsbetriebe&quot;,&nbsp; Nummer 207 von 31-10-1983 und die METAALUNIE-BEDINGUNGEN, fr&uuml;her als SMECOMA-BEDINGUNGEN (niederl&auml;ndische Stiftung f&uuml;r Schmiede-, Konstruktions- und Maschinenbetriebe), bei der Gesch&auml;ftsstelle des Landesgerichts in Rotterdam am 1. Januar 2001 Hinterlegt. (auf W&uuml;nsch Verf&uuml;gbar)</p>

                        <p>Alle f&uuml;r die W&auml;rmebehandlungs erforderlichen Angaben, Informationen und Pr&uuml;fkennwerte der Bauteile sind vom Kunden dem Auftrag beizulegen.<br />
                        Wir haften nicht f&uuml;r Verzugs- und Rissfreiheit, da diese Eigenschaften durch zahlreiche Faktoren beeinflusst werden, die au&szlig;erhalb der W&auml;rmebehandlung liegen.<br />
                        Mit einem W&auml;rmebehandlungsauftrag k&ouml;nnen nur gleichzeitig und gleichartig zu Behandlenden Werkst&uuml;cke bearbeitet werden.</p>

                        <p><u>Preiskonditionen : </u>Unsere Preise sind pro St&uuml;ck, oder bei min. 4 st&uuml;ck,&nbsp; und deshalb NICHT Representative f&uuml;r Gro&szlig;en Mengen, wobei der Preis sich stark senken wird,&nbsp; <u>ohne Mehrwertsteuer, Transport und Verpackung</u> und alle zus&auml;tzlichen kosten;&nbsp; und f&uuml;r die Vorausgestellten Mengen von 1 - 4 St&uuml;ck jede Sorte.&nbsp;&nbsp;&nbsp;&nbsp;<br />
                        <u>Liefertermin</u> :&nbsp; Mindestens 3 Wochen f&uuml;r Behandlung.<br />
                        <u>Zahlungsbedingungen</u> :&nbsp; Preise pro st&uuml;ck,&nbsp; Zahlung Netto 30 Tage nach Rechnungsdatum.<br />
                        <u>Gesch&auml;ftsbedingungen</u>:&nbsp; Nur unsere Allgemeine Gesch&auml;ftsbedingungen gelten, bei Ihren Auftrag sind Sie hiermit Einverstanden.</p>

                        <p>Bei R&uuml;ckfragen stehen wir gerne zur Verf&uuml;gung.<br />
                        Mit freundlichen Gr&uuml;&szlig;en<br />
                        <strong>BEL-TEC</strong>HNOLOGIES NV.<br/>
                        Peter van Belle</p>




                      </textarea> <!-- CKEditor  !-->
                  </form>
                </div>



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

                              <!-- <input type="email" placeholder="Email" class="form-control" id="email" name="email"  value="{{ $data['company_email'] }}" placeholder="Email" > -->

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

