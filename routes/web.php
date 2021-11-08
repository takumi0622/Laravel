
<?php

use App\Http\Controllers;

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

//ログイン画面を表示
Route::get('/', 'LoginController@showLogin')->name('showLogin');

//ログイン処理
Route::post('/login/login', 'LoginController@login')->name('login');

//商品一覧画面を表示
Route::get('/product/ProductList', 'LoginController@showProduct')->name('showProduct');

// ----------------------------------------------------------------------------------

//ユーザー新規登録画面を表示
Route::get('/user/signup_form', 'UserController@showSignup_form')->name('signup');

//ユーザー新規登録
Route::post('/user/store', 'UserController@exeStore')->name('store');

// ----------------------------------------------------------------------------------

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
