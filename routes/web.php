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
    return view('welcome');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/delete', function () {
    return view('delete');
});
Route::get('/postdelete', function () {
    return view('postdelete');
});

Route::get('/mail', function () {
    return view('mail');
});
Route::get('/userlist', function () {
    return view('userlist');
});
Route::get('/advertlist', function () {
    return view('advertlist');
});

Route::get('/userpost', function () {
    return view('userpost');
});
Route::get('/userpostdelete', function () {
    return view('userpostdelete');
});
Route::get('/userpostedit', function () {
    return view('userpostedit');
});
Route::get('/image', function () {
    return view('image');
});
Route::get('/favorite', function () {
    return view('favorite');
});
Route::get('/recommend', function () {
    return view('recommend');
});
/*Login Routes*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@UserLogout')->name('user.logout');

//Administrator Auth
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	
	// Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

//Product & Category Route
Route::resource('product', 'ProductController');
Route::resource('category', 'CategoriesController');
Route::resource('comment','CommentController',['only'=>['update','destroy']]);
Route::post('comment/create/{product}','CommentController@addProductComment')->name('productcomment.store');
Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');
Route::post('product/like','LikeController@likeIt')->name('likeIt');
Route::post('product/dislike','DislikeController@dislikeIt')->name('dislikeIt');
