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

Route::group(['prefix' => 'admin'], function () {
    Route::get('index', 'AdminControllers@index');
    Route::get('/category', 'CategoryControllers@index');
    Route::post('addcategory', 'CategoryControllers@addcategory');
    Route::get('getcategories', 'CategoryControllers@getcategories');
    Route::post('/deletecategory', 'CategoryControllers@removecategory');


});


Route::get('user', function () {
    return view('welcome');
});

Route::get('/advert', 'HomeControllers@advert');
Route::post('/parent', 'HomeControllers@AdvertParent');
Route::post('/Sendsubmenu', 'HomeControllers@Sendsubmenu');
Route::post('/subcats', 'HomeControllers@subcats');

Route::post('/catmenus', 'HomeControllers@catmenus');
Route::post('/send_advert2', "HomeControllers@send_advert2");

Route::post('/addstate', 'AdvertControllers@addstate');

Route::post('/addimage', 'AdvertControllers@addimage');
Route::get('/sendsms', 'AdvertControllers@sendsms');

Route::post('/addcars', 'AdvertControllers@addcars');

Route::post('/addpublic', 'AdvertControllers@addpublic');


Route::get('/manage/{category_id}/{id}', 'ManageControllers@index')->name('manage');

Route::post('/verifyCode', 'AdvertControllers@verifyCode');

Route::get('/edit/{category_id}/{id}', 'ManageControllers@edit');

Route::post('/editadvert', 'ManageControllers@editadvert');
Route::post('/editimage', 'ManageControllers@editimage');

Route::post("/deleteadvert", "ManageControllers@deleteadvert");

Route::get('/order/{id}', 'OrderControllers@order');

Route::post("/addorder", "OrderControllers@addorder");
Route::post("/buyback", 'OrderControllers@buyback');

