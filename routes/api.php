<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function(){
	// auth
	Route::post('/auth/signup','AuthController@signup');
	Route::post('/auth/signin','AuthController@signin');
	Route::get('/users','AuthController@index');
	Route::get('/users/{id}','AuthController@show');

	
	Route::group(['middleware' => ['jwt.auth']], function(){
		// upload foto
		Route::post('/upload_foto','ConfigController@upload_foto');		
	});

	Route::group(['middleware' => ['cors']], function(){
		Route::get('/get_provinsi','HomeController@provinsi');
	
	});
	

	Route::get('/slideshow','HomeController@slideshow');
	Route::get('/product','HomeController@product');
	Route::get('/why_us','HomeController@why_us');
	Route::get('/binefit','HomeController@binefit');
	Route::get('/project','HomeController@project');
	Route::get('/gallery','HomeController@gallery');
	Route::get('/contact_info','HomeController@contact_info');
	Route::get('/detail_product','HomeController@detail_product');
	Route::get('/get_size_product','HomeController@get_size_product');
	Route::get('/get_price_product','HomeController@get_price_product');
	// Route::get('/get_provinsi','HomeController@provinsi');
	Route::get('/get_city','HomeController@kota');
	Route::get('/get_disctict','HomeController@kecamatan');
	Route::get('/get_tarif','HomeController@tarif');
	Route::post('/create_transaction','TransactionController@create_payment');
	Route::post('/register','AuthController@register');
	Route::post('/login_vue','AuthController@login_vue');
	Route::post('/request_sample','MemberController@request_sample');
	



});

