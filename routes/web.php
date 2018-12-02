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

Route::get('/', function () {
    return view('utama');
});

Auth::routes();

Route::get('/profile', function(){
	return view('profile/view');
});

Route::group(['prefix' => 'user', 'middleware' => ['user','auth','web']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	// Cari Tiket
	Route::get('/cari-tiket','User\TicketController@cari')->name('user.cari-tiket');
	Route::get('/cari-tiket/all','User\TicketController@viewAll')->name('user.cari-tiket.all');
	Route::get('/cari-tiket/show','User\TicketController@show')->name('user.cari-tiket.show');
	// Reserve
	Route::get('/reservation/show/{id}','User\ReservationController@view')->name('user.reserve.form');
	Route::post('/reservation/{id}/order','User\ReservationController@book')->name('user.reserve.order');
	// Ticket
	Route::get('/my-ticket/all','User\TicketController@viewAllTicket')->name('user.my-ticket.all');
	Route::get('/my-ticket/{id}','User\TicketController@myTicket')->name('user.my-ticket');
	// Profile
	Route::get('/profile','User\ProfileController@show')->name('user.profile');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin','auth','web']], function(){
	Route::get('/home','HomeController@adminIndex')->name('admin.home');
	// Ticket
	Route::get('/manage-ticket','Admin\ManageTicketController@index')->name('admin.manage-ticket');
	Route::get('manage-ticket/data','Admin\ManageTicketController@TicketDatatables')->name('admin.manage-ticket.data');
	Route::get('/manage-ticket/{id}/edit','Admin\ManageTicketController@TicketEdit')->name('admin.manage-ticket.edit');
	Route::get('/manage-ticket/{id}/preview','Admin\ManageTicketController@TicketShow')->name('admin.manage-ticket.show');
	Route::get('manage-ticket/add','Admin\ManageTicketController@TicketAdd')->name('admin.manage-ticket.add');
	Route::post('manage-ticket/store','Admin\ManageTicketController@store')->name('admin.manage-ticket.store');
	// Brand
	Route::get('/manage-brand','Admin\ManageBrandController@index')->name('admin.manage-brand');
	Route::get('manage-brand/data','Admin\ManageBrandController@BrandDatatables')->name('admin.manage-brand.data');
	Route::get('/manage-brand/{id}/edit','Admin\ManageBrandController@BrandEdit')->name('admin.manage-brand.edit');
	Route::get('/manage-brand/{id}/preview','Admin\ManageBrandController@BrandShow')->name('admin.manage-brand.show');
	Route::get('manage-brand/add','Admin\ManageBrandController@BrandAdd')->name('admin.manage-brand.add');
	Route::post('manage-brand/store','Admin\ManageBrandController@store')->name('admin.manage-brand.store');
	// Category
	Route::get('/manage-category','Admin\ManageCategoryController@index')->name('admin.manage-category');
	Route::get('manage-category/data','Admin\ManageCategoryController@CategoryDatatables')->name('admin.manage-category.data');
	Route::get('/manage-category/{id}/edit','Admin\ManageCategoryController@CategoryEdit')->name('admin.manage-category.edit');
	Route::get('/manage-category/{id}/preview','Admin\ManageCategoryController@CategoryShow')->name('admin.manage-category.show');
	Route::get('manage-category/add','Admin\ManageCategoryController@CategoryCreate')->name('admin.manage-category.add');
	Route::post('manage-category/store','Admin\ManageCategoryController@store')->name('admin.manage-category.store');
	Route::get('manage-category/delete/{id}','Admin\ManageCategoryController@delete')->name('admin.manage-category.delete');

	// Reservation
	Route::get('manage-reservation','Admin\ManageReservasiController@index')->name('admin.manage-reservation');
	Route::get('manage-reservation/data','Admin\ManageReservasiController@ReservasiDatatables')->name('admin.manage-reservation.data');
	Route::get('/manage-reservation/{id}/edit','Admin\ManageReservasiController@ReservasiEdit')->name('admin.manage-reservation.edit');
	Route::get('/manage-reservation/{id}/preview','Admin\ManageReservasiController@ReservasiShow')->name('admin.manage-reservation.show');
	Route::get('manage-reservation/add','Admin\ManageReservasiController@ReservasiCreate')->name('admin.manage-reservation.add');
	Route::post('manage-reservation/store','Admin\ManageReservasiController@store')->name('admin.manage-reservation.store');
	// Member
	Route::get('manage-member','Admin\ManageMemberController@index')->name('admin.manage-member');
	Route::get('manage-member/data','Admin\ManageMemberController@MemberDatatables')->name('admin.manage-member.data');
	Route::get('/manage-member/{id}/edit','Admin\ManageMemberController@MemberEdit')->name('admin.manage-member.edit');
	Route::get('/manage-member/{id}/preview','Admin\ManageMemberController@MemberShow')->name('admin.manage-member.show');
	Route::get('manage-member/add','Admin\ManageMemberController@MemberCreate')->name('admin.manage-member.add');
	Route::post('manage-member/store','Admin\ManageMemberController@store')->name('admin.manage-member.store');

	// Profile
	Route::get('profile','Admin\ProfileController@show')->name('admin.profile');
});

Route::get('/profile/edit', 'Controller@edit');

Route::post('/profile/saved', 'Controller@saved');

Route::post('/display/search', 'BusController@search');

Route::get('/buses', 'BusController@index');

Route::get('display/ticket/{id}', 'BusController@view');

Route::post('/ticket/booked/{id}', 'TicketController@book');

Route::get('/ticket/all', 'TicketController@all');

Route::get('ticket/view/{id}', 'TicketController@view');

Route::get('ticket/cancel/{id}', 'TicketController@cancel');

Route::get('ticket/cancelled/{id}', 'TicketController@cancelled');

Route::get('/suggest', 'Controller@suggest');

Route::post('/suggested', 'Controller@suggested');