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

Route::get('/',[
	'uses'=>'homeCtrl@index',
	'as'=>'home.index'
]);
	
Route::get('/shop',[
	'uses'=>'homeCtrl@shop',
	'as'=>'home.shop'
]);
Route::get('/cart',[
	'uses'=>'homeCtrl@cart',
	'as'=>'home.cart'
]);
Route::get('/checkout',[
	'uses'=>'homeCtrl@checkout',
	'as'=>'home.checkout'
]);

Route::group(['prefix'=>'/administrator'],function(){
	Route::get('/',[
	'uses'=>'adminCtrl@index',
	'as'=>'adminCtrl.index'
]);
});
Route::group(['prefix'=>'/administrator'],function(){
Route::get('/category','categoryCtrl@index');
Route::get('/insertCategory','categoryCtrl@create');
Route::post('/insertCategory','categoryCtrl@insert');
Route::get('/editCategory/{id}',[
	'uses'=> 'categoryCtrl@edit',
	'as'=>'editCategory'
]);
Route::post('/editCategory/{id}',[
	'uses'=> 'categoryCtrl@update',
	'as'=>'updateCategory'
]);
Route::get('/delCategory/{id}',[
	'uses'=> 'categoryCtrl@delete',
	'as'=>'deleteCategory'
]);

Route::get('/brand','brandCtrl@index');
Route::get('/insertBrand','brandCtrl@create');
Route::post('/insertBrand','brandCtrl@insert');
Route::get('/editBrand/{id}',[
	'uses'=> 'brandCtrl@edit',
	'as'=>'editBrand'
]);
Route::post('/editBrand/{id}',[
	'uses'=> 'brandCtrl@update',
	'as'=>'updateBrand'
]);
Route::get('/delBrand/{id}',[
	'uses'=> 'brandCtrl@delete',
	'as'=>'deleteBrand'
]);

Route::get('/gender','genderCtrl@index');
Route::get('/insertGender','genderCtrl@create');
Route::post('/insertGender','genderCtrl@insert');
Route::get('/editGender/{id}',[
	'uses'=> 'genderCtrl@edit',
	'as'=>'editGender'
]);
Route::post('/editGender/{id}',[
	'uses'=> 'genderCtrl@update',
	'as'=>'updateGender'
]);
Route::get('/delGender/{id}',[
	'uses'=> 'genderCtrl@delete',
	'as'=>'deleteGender'
]);

Route::get('/material','materialCtrl@index');
Route::get('/insertMaterial','materialCtrl@create');
Route::post('/insertMaterial','materialCtrl@insert');
Route::get('/editMaterial/{id}',[
	'uses'=> 'materialCtrl@edit',
	'as'=>'editMaterial'
]);
Route::post('/editMaterial/{id}',[
	'uses'=> 'materialCtrl@update',
	'as'=>'updateMaterial'
]);
Route::get('/delMaterial/{id}',[
	'uses'=> 'materialCtrl@delete',
	'as'=>'deleteMaterial'
]);

Route::get('/size','sizeCtrl@index');
Route::get('/insertSize','sizeCtrl@create');
Route::post('/insertSize','sizeCtrl@insert');
Route::get('/editSize/{id}',[
	'uses'=> 'sizeCtrl@edit',
	'as'=>'editSize'
]);
Route::post('/editSize/{id}',[
	'uses'=> 'sizeCtrl@update',
	'as'=>'updateSize'
]);
Route::get('/delSize/{id}',[
	'uses'=> 'sizeCtrl@delete',
	'as'=>'deleteSize'
]);

Route::get('/colors','colorsCtrl@index');
Route::get('/insertColors','colorsCtrl@create');
Route::post('/insertColors','colorsCtrl@insert');
Route::get('/editColors/{id}',[
	'uses'=> 'colorsCtrl@edit',
	'as'=>'editColors'
]);
Route::post('/editColors/{id}',[
	'uses'=> 'colorsCtrl@update',
	'as'=>'updateColors'
]);
Route::get('/delColors/{id}',[
	'uses'=> 'colorsCtrl@delete',
	'as'=>'deleteColors'
]);
Route::get('/product','productCtrl@index');
Route::get('/insertProduct','productCtrl@returnCreat');
//create size
Route::post('/createSize',[
	'uses'=> 'productCtrl@createSize',
	'as'=>'createSizePost'
]);
//
Route::get('/createMaterial/{id}',[
	'uses'=> 'productCtrl@createMaterial',
	'as'=>'createMaterial'
]);
Route::post('/insertProduct','productCtrl@insert');
Route::get('/editProduct/{id}',[
	'uses'=> 'productCtrl@edit',
	'as'=>'editProduct'
]);
Route::post('/editProduct/{id}',[
	'uses'=> 'productCtrl@update',
	'as'=>'updateProduct'
]);
Route::get('/delProduct/{id}',[
	'uses'=> 'productCtrl@delete',
	'as'=>'deleteProduct'
]);
Route::get('/','adminCtrl@index');
//login
Route::get('/login','UserAdminCtrl@getLogin');
Route::post('/login','UserAdminCtrl@postLogin');
//end
//admin account
Route::get('/admin','adminCtrl@list');
Route::get('/insertAdmin','adminCtrl@create');
Route::post('/insertAdmin','adminCtrl@insert');
Route::post('/levelUpAdmin','adminCtrl@levelUp');
Route::get('/editAdmin/{id}',[
	'uses'=> 'adminCtrl@edit',
	'as'=>'editAdmin'
]);
Route::post('/editAdmin/{id}',[
	'uses'=> 'adminCtrl@update',
	'as'=>'updateAdmin'
]);
Route::get('/delAdmin/{id}',[
	'uses'=> 'adminCtrl@delete',
	'as'=>'delAdmin'
]);
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
