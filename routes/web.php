<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return view('auth/login');
	// return view('example');
});

Route::get('/admin/fillable','KlantenController@fillablemethod');
Auth::routes();

################## CLIENT
Route::get('/admin/client','KlantenController@index');
// REUSE
Route::post('/kstore', 'KlantenController@store');
// CREATE 
Route::get('/kread/{id}', 'KlantenController@show');
Route::get('/kedit/{id}', 'KlantenController@edit');
// UPDATE
Route::post('/kupdate/{id}', 'KlantenController@update');
// DELETE
Route::get('/kdelete/{id}', 'KlantenController@destroy');

################## SUPLLIER
Route::get('/admin/supplier', 'LeveranciersController@index');
// REUSE
Route::post('/lstore', 'LeveranciersController@store');
// CREATE 
Route::get('/lread/{id}', 'LeveranciersController@show');
Route::get('/ledit/{id}', 'LeveranciersController@edit');
// UPDATE
Route::post('/lupdate/{id}', 'LeveranciersController@update');
// DELETE
Route::get('/ldelete/{id}', 'LeveranciersController@destroy');

################## ORDER
// 1
Route::get('/admin/orders', 'OrdersController@index');
Route::post('/ostore', 'OrdersController@store');
Route::get('/oread/{id}/{order_reference_number}', 'OrdersController@show');
Route::get('/odelete/{id}', 'OrdersController@destroy');

// 2,3
Route::get('/generate-quotation-request-form/{id}/{supplier_name}/{row_num}/{column_num}', 'StatusTwoThreeController@generateQuotationRequestForm');


// ORDER DETAILS
Route::post('/order-details/{id}', 'StatusTwoThreeController@orderdetails');

Route::post('/post-generate-quotation-request-form', 'StatusTwoThreeController@postGenerateQuotationRequestForm');
Route::post('/quote-request/{id}', 'StatusTwoThreeController@quotedreceived');
Route::post('/oquotedreceived/{id}', 'StatusTwoThreeController@quotedreceived');

// 4,5
Route::get('/generate-quotation-request/{id}/{client_id}', 'StatusFourFiveController@generateQuotationRequest');
Route::post('/post-generate-quotation-request', 'StatusFourFiveController@postGenerateQuotationRequest');
Route::post('/quote-sup-received/{id}', 'StatusTwoThreeController@quotedsupreceivedrequest');
Route::post('/quote-sent/{id}', 'StatusFourFiveController@quotedacceptancesent');

// 6,7,8
Route::get('/send-confirmation-to-supplier/{id}/{supplier_name}', 'StatusSixSevenEightController@generateSupplierconfirmation');
Route::post('/post-send-confirmation-to-supplier', 'StatusSixSevenEightController@postGenerateSupplierconfirmation');
Route::post('/quote-acceptance/{id}', 'StatusSixSevenEightController@uploadConfirmationToSupplierDoc');
Route::get('/generate-client-confirmation/{id}/{client_id}', 'StatusSixSevenEightController@generateConfirmationToClient');
Route::post('/post-generate-client-confirmation', 'StatusSixSevenEightController@postGenerateConfirmationToClient');
Route::post('/send-confirmation-to-supplier/{id}', 'StatusSixSevenEightController@uploadConfirmationToSupplierDoc');
Route::get('/generate-client-confirmation/{id}/{client_id}', 'StatusSixSevenEightController@generateConfirmationToClient');

// 9,10,11,12
Route::post('/generate-confirmation-to-client-doc/{id}', 'StatusNineTenElevenTwelveController@uploadConfirmationSupplierClient');
Route::get('/generate-delivery-document/{id}', ['as'=>'generate-delivery-document', 'uses'=>'StatusNineTenElevenTwelveController@generateDeliveryDocument']);
Route::post('/sent-delivery-document-to-supplier', 'StatusNineTenElevenTwelveController@postGenerateDeliverydocumentforsupplier');

// 13, 14, 15
Route::post('/upload-supplier-invoice/{id}', 'ThirteenFourteenFifteenController@uploadSupplierInvoice');
Route::get('/generate-invoice/{id}', ['as'=>'generate-invoice', 'uses'=>'GenerateInvoiceController@generateInvoice']);
Route::post('/generate-invoice', 'ThirteenFourteenFifteenController@postGenerateInvoice');