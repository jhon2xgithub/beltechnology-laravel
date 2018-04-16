<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function generateDocx()
    {   


        $languageEnGb = new \PhpOffice\PhpWord\Style\Language(\PhpOffice\PhpWord\Style\Language::EN_GB);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->getSettings()->setThemeFontLang($languageEnGb);



        $section = $phpWord->addSection();

        $fontStyleName = 'rStyle';
        $phpWord->addFontStyle($fontStyleName, array('bold' => false, 'italic' => false, 'size' => 9, 'allCaps' => false, 'doubleStrikethrough' => false));
        
        // New landscape section
        // $section = $phpWord->addSection(array('orientation' => 'portrait'));

        $multipleTabsStyleName = 'multipleTab';
        $phpWord->addParagraphStyle(
            $multipleTabsStyleName,
            array(
                'tabs' => array(
                    new \PhpOffice\PhpWord\Style\Tab('left', 1550),
                    new \PhpOffice\PhpWord\Style\Tab('center', 3200),
                    new \PhpOffice\PhpWord\Style\Tab('right', 5300),
                ),
            )
        );

        $rightTabStyleName = 'rightTab';
        $phpWord->addParagraphStyle($rightTabStyleName, array('tabs' => array(new \PhpOffice\PhpWord\Style\Tab('right', 9090))));

        $leftTabStyleName = 'centerTab';
        $phpWord->addParagraphStyle($leftTabStyleName, array('tabs' => array(new \PhpOffice\PhpWord\Style\Tab('center', 4680))));

        // New portrait section
        // $section = $phpWord->addSection move to new section
        // Add listitem elements
        // $section->addText("Multiple Tabs:\tOne\tTwo\tThree", null, $multipleTabsStyleName);
        // $section->addText("Left Aligned\tRight Aligned", null, $rightTabStyleName);

        $boldFontStyleName = 'BoldText';
        $phpWord->addFontStyle($boldFontStyleName, array('bold' => true, 'name' => 'Corbel', 'size' => 9, 'underline' => 'single'));

        // Define styles
        $paragraphStyleName = 'pStyle';
        $phpWord->addParagraphStyle($paragraphStyleName, array('spacing' => 100));        
     
        // left 
        $section->addText("\tARCELOR-MITTAL GEEL", null, $rightTabStyleName, $boldFontStyleName);
        $section->addText("\tT.a.v. Dhr. Peter Wuyts", null, $rightTabStyleName, $boldFontStyleName);
        $section->addText("\tLammerdries,  10  Ind Z. Geel-West", null, $rightTabStyleName);   
        $section->addText("\tB-2440  Geel", null, $rightTabStyleName);

        //left and right
        $section->addText("PvB/18.369/A1701\t11/12/2017", null, $rightTabStyleName);

        // Inline font style
        $fontStyle['name'] = 'Corbel';
        $fontStyle['size'] = 9;
        // $fontStyle['spacing'] = 100;

        $textrun = $section->addTextRun($paragraphStyleName);    

        // $textrun = $section->addTextRun();
        $textrun->addText('Wij danken U voor Uw uw prijsaanvraag van 11/12 voor het', $fontStyle);
        $textrun->addText(' TEFLON-COATEN', $boldFontStyleName); 
        $textrun->addText(' van lekpannen,  en hebben het genoegen U hierbij onze offerte toe te sturen :', $fontStyle);

        $section->addText('Op werkstukken door u aan te leveren, onder voorbehoud van controle, werkstukken klaar voor behandeling, en voorzien van een voor u ideale oppervlaktegesteldheid,  vrij van vervuiling, beschadigingen en oliën.', $fontStyle);


        // --------------------------------------------------------------------

        // New section
        $section->addText('Basic simple bulleted list.');
        $section->addListItem('List Item 1');
        $section->addListItem('List Item 2');
        $section->addListItem('List Item 3');
        $section->addTextBreak(2);

        // --------------------------------------------------------------------

        $paragraphStyleName = 'pStyle';
        $phpWord->addParagraphStyle($paragraphStyleName, array('spacing' => 100));         

        // --------------------------------------------------------------------
        $textrun = $section->addTextRun($paragraphStyleName);
        $textrun->addText('Levertijd: ', ['name'=>'corbel', 'size'=>9, 'underline'=> 'single']);
        $textrun->addText(' volgens afspraak,  min. 2 weken.', $fontStyle);

        $textrun = $section->addTextRun($paragraphStyleName);
        $textrun->addText('Betalingscondities: ', ['name'=>'corbel', 'size'=>9, 'underline'=> 'single']);
        $textrun->addText(' Netto,  30 dagen na factuurdatum.', $fontStyle);

        $textrun = $section->addTextRun($paragraphStyleName);
        $textrun->addText('Algemene voorwaarden: ', ['name'=>'corbel', 'size'=>9, 'underline'=> 'single']);
        $textrun->addText(' enkele onze algemene voorwaarden zijn van toepassing, bij order aanvaard de klant.', $fontStyle);

        $section->addText('Wij vertrouwen erin u hiermede van dienst te zijn geweest en houden ons voor uw gewaardeerde opdracht beleefd ', $fontStyle);
        $section->addText('aanbevolen.', $fontStyle);
        // --------------------------------------------------------------------
        $textrun = $section->addTextRun($paragraphStyleName);
        $textrun->addText('Levertijd: ', ['name'=>'corbel', 'size'=>9, 'underline'=> 'single']);
        $textrun->addText(' volgens afspraak,  min. 2 weken.', $fontStyle);

        $textrun = $section->addTextRun($paragraphStyleName);
        $textrun->addText('Betalingscondities: ', ['name'=>'corbel', 'size'=>9, 'underline'=> 'single']);
        $textrun->addText(' Netto,  30 dagen na factuurdatum.', $fontStyle);

        $textrun = $section->addTextRun($paragraphStyleName);
        $textrun->addText('Algemene voorwaarden: ', ['name'=>'corbel', 'size'=>9, 'underline'=> 'single']);
        $textrun->addText(' enkele onze algemene voorwaarden zijn van toepassing, bij order aanvaard de klant.', $fontStyle);

        $section->addText('Wij vertrouwen erin u hiermede van dienst te zijn geweest en houden ons voor uw gewaardeerde opdracht beleefd ', $fontStyle);
        $section->addText('aanbevolen.', $fontStyle);




        // $textrun->addText('Betalingscondities: ', ['name'=>'corbel', 'size'=>9]);
        // $textrun->addText('Netto,  30 dagen na factuurdatum.', $fontStyle);

        // $textrun->addText('Algemene voorwaarden: ', ['name'=>'corbel', 'size'=>9]);
        // $textrun->addText('enkele onze algemene voorwaarden zijn van toepassing, bij order aanvaard de klant.', $fontStyle);

        // $section->addText('Wij vertrouwen erin u hiermede van dienst te zijn geweest en houden ons voor uw gewaardeerde opdracht beleefd ', $fontStyle);
        // $section->addText('aanbevolen.', $fontStyle);


        $section->addPageBreak(); // add new page
        $section->addPageBreak();

        // New portrait section
        $section = $phpWord->addSection(
            array('paperSize' => 'Folio', 'marginLeft' => 600, 'marginRight' => 600, 'marginTop' => 600, 'marginBottom' => 600)
        );
        $section->addText('This section uses other margins with folio papersize.');

        // New portrait section with Header & Footer
        $section = $phpWord->addSection(
            array(
                'marginLeft'   => 200,
                'marginRight'  => 200,
                'marginTop'    => 200,
                'marginBottom' => 200,
                'headerHeight' => 50,
                'footerHeight' => 50,
            )
        );
        $section->addText('This section and we play with header/footer height.');
        $section->addHeader()->addText('Header');
        $section->addFooter()->addText('Footer');


      

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('helloWorld.docx')); 
        } catch (Exception $e) {
        }


        return response()->download(storage_path('helloWorld.docx'));
    }
}
