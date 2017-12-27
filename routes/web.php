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
use App\admin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);


route::group(['prefix' => 'admin'],function(){

	route::get('/danhsach',[
		'as'=>'Admindanhsach',
		'uses'=>'PageController@getdanhsach']);

	route::get('/them','PageController@getthem');
	route::post('them','PageController@postthem');


	route::get('/sua/{id}',[
		'as'=>'suasanpham',
		'uses'=>'PageController@getsua'
	]);


	route::post('/sua/{id}','PageController@postsua');
	route::get('xoa/{id}',[
		'as'=>'xoasanpham',
		'uses'=>'PageController@getxoa'
	]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
