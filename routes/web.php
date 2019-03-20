<?php

// Route::get('/', function () {
//     return view('home');
// })->name('home');


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');



Route::get('/book/{book}', 'bookCnt@bookdetials')->name('bookdetials');

Route::get('/category/{category}','bookCnt@cat_wise_books')->name('cat_wise_books');

Route::get('/search/{search}','searchCnt@search');

Route::group(['middleware'=>'auth'], function (){

    Route::get('/cart','CartCnt@index')->name('cart.index');
    Route::post('/cart/store','CartCnt@store')->name('cart.store');
    Route::patch('/cart/{order}','CartCnt@update')->name('cart.update');
    Route::delete('/destroy/{order}','CartCnt@destroy')->name('cart.destroy');
    Route::put('/placeorder','CartCnt@placeorder')->name('placeorder');
    Route::get('/order/lists','CartCnt@order_list')->name('order_list');

    Route::get('/borrowlist','BorrowCnt@index')->name('borrowlist');


    Route::get('/profile','profileCnt@index')->name('profile.index');
    Route::get('/profile/edit','profileCnt@edit')->name('profile.edit');
    Route::post('/profile/update','profileCnt@update')->name('profile.update');
    Route::get('/profile/reset/password','profileCnt@reset_password')->name('reset_password');
    Route::patch('/profile/changePassword','profileCnt@changePassword')->name('changePassword');


});

Route::prefix('admin')->group(function(){

	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/login','Auth\AdminLoginController@showLoginFrom')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	Route::get('/users', 'AdminUsersCnt@index')->name('admin.users');
	Route::get('/deleteUser/{user}', 'AdminUsersCnt@deleteUser')->name('admin.deleteUser');

	Route::resource('book','Admin\BookCnt');
	Route::resource('category','Admin\BookCatCnt');
	Route::resource('author','Admin\AuthorCnt');

    Route::get('/orders','admin\orderCnt@index')->name('order.index');
    Route::get('/order/{order}/details','Admin\orderCnt@order_details')->name('order_details');

    Route::get('/borrow','admin\BorrowCnt@index')->name('borrow.index');
    Route::post('/borrow/store','admin\BorrowCnt@store')->name('borrow.store');
    Route::get('/borrow/update/{user_id}/{book_id}','admin\BorrowCnt@update')->name('borrow.update');


});


