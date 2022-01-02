
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//検索機能
Route::get('/home', 'HomeController@exeSearch')->name('search');

//商品登録画面を表示
ROute::get('/product/create', 'HomeController@showCreate')->name('showCreate');

//商品詳細画面を表示
Route::get('/product/{id}', 'HomeController@showDetail')->name('showDetail');

//商品編集画面を表示
Route::get('/product/edit/{id}', 'HomeController@showEdit')->name('showEdit');

//商品検索
Route::get('/search', 'HomeController@exeSearch')->name('search');

//商品編集
Route::post('/product/update', 'ProductController@exeUpdate')->name('update');

//商品登録
Route::post('/product/store', 'ProductController@exeStore')->name('productStore');

//商品削除
Route::get('/home/delete/{id}', 'ProductController@exeDelete')->name('delete');

// ----------------------------------------------------------------------------------

//ユーザー新規登録画面を表示
Route::get('/user/signup_form', 'UserController@showSignup_form')->name('signup');

//ユーザー新規登録
Route::post('/user/store', 'UserController@exeStore')->name('store');

// ----------------------------------------------------------------------------------

Auth::routes();

