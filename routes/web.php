<?php
Route::get('/', 'FrontController@index')->name('/');
Route::get('/slideshow_front','HomeController@slideshow')->name('slideshow_front');
Route::get('/product_front','HomeController@product')->name('product_front');
Route::get('/why_us_front','HomeController@why_us')->name('why_us_front');
Route::get('/binefit_front','HomeController@binefit')->name('binefit_front');
Route::get('/project_front','HomeController@project')->name('project_front');
Route::get('/gallery_front','HomeController@gallery')->name('gallery_front');
Route::get('/contact_info_front','HomeController@contact_info')->name('contact_info_front');
Route::get('/detail_product_front','HomeController@detail_product')->name('detail_product_front');
Route::get('/get_size_product_front','HomeController@get_size_product')->name('get_size_product_front');
Route::get('/get_price_product_front','HomeController@get_price_product')->name('get_price_product_front');
Route::get('/get_provinsi','HomeController@provinsi')->name('get_provinsi');
Route::get('/get_city_front','HomeController@kota')->name('get_city_front');
Route::get('/get_disctict_front','HomeController@kecamatan')->name('get_disctict_front');
Route::get('/get_tarif_front','HomeController@tarif')->name('get_tarif_front');
Route::post('/create_transaction_front','TransactionController@create_payment')->name('create_transaction_front');
Route::post('/create_transaction_custom','TransactionController@create_transaction_custom')->name('create_transaction_custom');
Route::get('/invoice','TransactionController@invoice')->name('invoice');
Route::post('/register_front','AuthController@register')->name('register_front');
Route::post('/login_vue_front','AuthController@login_vue')->name('login_vue_front');
Route::post('/request_sample_front','MemberController@request_sample')->name('request_sample_front');

Route::get('/shop','FrontController@shop')->name('shop');
Route::get('/donation','FrontController@donation')->name('donation');
Route::get('/gallery_kusuma','FrontController@gallery')->name('gallery_kusuma');
Route::get('/sample_custombox','FrontController@sample')->name('sample_custombox');
Route::get('/contact','FrontController@contact')->name('contact');
Route::get('/product_detail','FrontController@product_detail')->name('product_detail');
Route::get('/login_member','FrontController@login_member')->name('login_member');
Route::get('/register_member','FrontController@register_member')->name('register_member');

Route::get('/detail_models_front','FrontController@detail_models_front')->name('detail_models_front');

Route::get('/success','FrontController@success')->name('success');

// menu
Route::get('/checkout', 'FrontController@checkout')->name('checkout');


Route::group(['middleware' => ['auth']], function () {
	// return view('login/form_login');
	Route::get('/admin', 'HomeController@check_login');
});
Route::get('/forgot', function () {
	return view('login/forgot_password');
});
Auth::routes();

Route::group(['middleware' => 'admin'], function () {
	// Home
	Route::get('/home', 'HomeController@index')->name('home');
	// function delete
	Route::post('/delete', 'ConfigController@delete')->name('delete');
	Route::post('/delete_only', 'ConfigController@delete_only')->name('delete_only');
	// function upload file
	Route::post('/upload_file', 'ConfigController@upload_file')->name('upload_file');
	Route::post('/upload_file_base64', 'ConfigController@upload_file_base64')->name('upload_file_base64');
	Route::post('/upload_file_vue', 'ConfigController@upload_file_vue')->name('upload_file_vue');
	// group Menu
	Route::get('/menu_table', 'ConfigController@menu_table')->name('menu_table');
	Route::get('/menu_form', 'ConfigController@menu_form')->name('menu_form');
	Route::post('/menu_add', 'ConfigController@menu_add')->name('menu_add');
	Route::get('/menu_edit', 'ConfigController@menu_edit')->name('menu_edit');
	// sub menu
	Route::get('/sub_menu_table', 'ConfigController@sub_menu_table')->name('sub_menu_table');
	Route::get('/sub_menu_form', 'ConfigController@sub_menu_form')->name('sub_menu_form');
	Route::post('/sub_menu_add', 'ConfigController@sub_menu_add')->name('sub_menu_add');
	Route::get('/sub_menu_edit', 'ConfigController@sub_menu_edit')->name('sub_menu_edit');
	// user Management
	Route::get('/user_table', 'ConfigController@user_table')->name('user_table');
	Route::get('/user_list', 'ConfigController@user_list')->name('user_list');
	Route::get('/user_form', 'ConfigController@user_form')->name('user_form');
	Route::post('/user_add', 'ConfigController@user_add')->name('user_add');
	Route::get('/select_menu', 'ConfigController@select_menu')->name('select_menu');
	Route::get('/user_edit', 'ConfigController@user_edit')->name('user_edit');
	Route::post('/delete_prv', 'ConfigController@delete_prv')->name('delete_prv');
	// export
	Route::get('/export_excel', 'ExportController@export_excel')->name('export_excel');
	Route::get('/export_pdf', 'ExportController@export_pdf')->name('export_pdf');
	// role
	Route::get('/role_table', 'ConfigController@role_table')->name('role_table');
	Route::get('/role_list', 'ConfigController@role_list')->name('role_list');
	Route::get('/role_form', 'ConfigController@role_form')->name('role_form');
	Route::post('/role_add', 'ConfigController@role_add')->name('role_add');
	Route::get('/role_edit', 'ConfigController@role_edit')->name('role_edit');
	Route::post('/role_deleted', 'ConfigController@role_deleted')->name('role_deleted');
});
// piso management

Route::group(['middleware' => 'admin'], function () {
	Route::get('/list_piso', 'PisoController@list_piso')->name('list_piso');
	Route::get('/get_data_piso', 'PisoController@get_data')->name('get_data_piso');
	Route::get('/get_data_piso_filter', 'PisoController@get_data_piso_filter')->name('get_data_piso_filter');
	Route::get('/add_piso', 'PisoController@add_piso')->name('add_piso');
	Route::get('/edit_piso_form', 'PisoController@edit_piso_form')->name('edit_piso_form');
	Route::post('/add_piso', 'PisoController@piso_add')->name('piso_add');
	Route::post('/import_piso', 'PisoController@import_piso')->name('import_piso');
	

});
// homepage
Route::group(['middleware' => 'admin'], function () {
	//slideshow
	Route::get('/slideshow', 'HomePageController@slideshow')->name('slideshow');
	Route::get('/slideshow_form', 'HomePageController@slideshow_form')->name('slideshow_form');
	Route::get('/slideshow_form_edit', 'HomePageController@slideshow_form_edit')->name('slideshow_form_edit');
	Route::post('/slideshow_add', 'HomePageController@slideshow_add')->name('slideshow_add');
	// product
	Route::get('/product', 'HomePageController@product')->name('product');	
	Route::post('/product_add', 'HomePageController@product_add')->name('product_add');
	Route::get('/product_edit', 'HomePageController@product_edit')->name('product_edit');	
	Route::get('/product_form', 'HomePageController@product_form')->name('product_form');
	// why us 
	Route::get('/why_us', 'HomePageController@why_us')->name('why_us');	
	Route::get('/form_why_us', 'HomePageController@form_why_us')->name('form_why_us');	
	Route::post('/whyus_add', 'HomePageController@whyus_add')->name('whyus_add');	
	// binefit
	Route::get('/binefit', 'HomePageController@binefit')->name('binefit');
	Route::get('/binefit_form', 'HomePageController@binefit_form')->name('binefit_form');
	Route::post('/binefit_add', 'HomePageController@binefit_add')->name('binefit_add');
	// project
	Route::get('/project', 'HomePageController@project')->name('project');
	Route::get('/project_form', 'HomePageController@project_form')->name('project_form');
	Route::post('/project_add', 'HomePageController@project_add')->name('project_add');
	// gallery 
	Route::get('/gallery', 'HomePageController@gallery')->name('gallery');
	Route::get('/gallery_form', 'HomePageController@gallery_form')->name('gallery_form');
	Route::post('/gallery_add', 'HomePageController@gallery_add')->name('gallery_add');
	//contact us
	Route::get('/contact_info', 'HomePageController@contact_info')->name('contact_info');	
	Route::get('/contact_form', 'HomePageController@contact_form')->name('contact_form');
	Route::post('/contact_add', 'HomePageController@contact_add')->name('contact_add');	
	Route::get('/get_member_address', 'HomePageController@get_member_address')->name('get_member_address');
	// profile
	Route::get('/profile_member', 'HomePageController@profile_member')->name('profile_member');
	Route::post('/update_profile_member', 'HomePageController@update_profile_member')->name('update_profile_member');
	Route::get('/history_pesanan', 'TransactionController@history_pesanan')->name('history_pesanan');


});
// transaksi
Route::group(['middleware' => 'admin'], function () {
	Route::get('/new_order', 'TransactionController@new_order')->name('new_order');
	Route::get('/review_detail_transaction', 'TransactionController@review_detail_transaction')->name('review_detail_transaction');
	Route::get('/check_pengiriman', 'TransactionController@check_nomor_resi_status')->name('check_pengiriman');
	Route::get('/order_form', 'TransactionController@order_form')->name('order_form');
	Route::post('/update_nomor_resi', 'TransactionController@update_nomor_resi')->name('update_nomor_resi');
	

});
//member
Route::group(['middleware' => 'admin'], function () {
	Route::get('/member', 'MemberController@index')->name('member');

});
//sample
Route::group(['middleware' => 'admin'], function () {
	Route::get('/sample', 'MemberController@sample')->name('sample');

});

// shedule
Route::group(['middleware' => 'admin'], function () {
	Route::get('/schedule_project', 'ScheduleController@project')->name('schedule_project');
	Route::get('/get_data_project', 'ScheduleController@get_data_project')->name('get_data_project');
	Route::get('/get_data_project_filter', 'ScheduleController@get_data_project_filter')->name('get_data_project_filter');
	Route::get('/add_project', 'ScheduleController@add_project')->name('add_project');

});

// acara
Route::get('/acara', 'HomePageController@acara')->name('acara');	
Route::post('/acara_add', 'HomePageController@acara_add')->name('acara_add');
Route::get('/acara_edit', 'HomePageController@acara_edit')->name('acara_edit');	
Route::get('/acara_form', 'HomePageController@acara_form')->name('acara_form');


