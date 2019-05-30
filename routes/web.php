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

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('client')->group(function() {
    Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('/register', 'Auth\ClientLoginController@showRegisterForm')->name('client.register');
    Route::post('/register', 'Auth\ClientLoginController@register')->name('client.register.submit');
    Route::get('/', 'ClientController@index')->name('client.dashboard');
    Route::post('/verEmpresa', 'ClientController@showEmpresa');
    Route::get('/search', 'ClientController@showAll');
    Route::get('/viewConfigure/{id}', 'ClientController@getConfigurar');
    Route::post('/configure/{id}', 'ClientController@setConfigurar');
});

Route::prefix('staff')->group(function() {
    Route::get('/login', 'Auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::post('/login', 'Auth\StaffLoginController@login')->name('staff.login.submit');
    Route::get('/', 'StaffController@index')->name('staff.dashboard');
    Route::get('/cajeroPagado/{id}', 'StaffController@pagado');
    Route::get('/cajeroPreparado/{id}', 'StaffController@preparado');
    Route::get('/repartidorEntregar/{id}', 'StaffController@entregado');
});

Route::prefix('empresa')->group(function() {
    Route::get('/login', 'Auth\EmpresaLoginController@showLoginForm')->name('empresa.login');
    Route::post('/login', 'Auth\EmpresaLoginController@login')->name('empresa.login.submit');
    Route::get('/register', 'Auth\EmpresaLoginController@showRegisterForm')->name('empresa.register');
    Route::post('/register', 'Auth\EmpresaLoginController@register')->name('empresa.register.submit');
    Route::get('/', 'EmpresaController@index')->name('empresa.dashboard');
    Route::get('/viewStaffs/{id}', 'EmpresaController@verStaffs');
    Route::get('/addStaffs/{id}', 'EmpresaController@getStaffs');
    Route::post('/addStaffs/{id}', 'EmpresaController@setStaffs');
    Route::get('/viewProducts/{id}', 'EmpresaController@verProducts');
    Route::get('/addProducts/{id}', 'EmpresaController@getProducts');
    Route::post('/addProducts/{id}', 'EmpresaController@setProducts');
    Route::get('/editProducts/{id}', 'EmpresaController@editProducts');
    Route::post('/updateProducts/{id}', 'EmpresaController@updateProducts');
    Route::get('/deleteProducts/{id}', 'EmpresaController@deleteProducts');
    Route::get('/viewConfigure/{id}', 'EmpresaController@getConfigurar');
    Route::post('/configure/{id}', 'EmpresaController@setConfigurar');
});

Route::get('producto/{id}', 'ProductsController@index');
Route::get('cart', 'ProductsController@cart'); 
Route::get('add-to-cart/{id}', 'ProductsController@addToCart');
Route::patch('update-cart', 'ProductsController@update');
Route::delete('remove-from-cart', 'ProductsController@remove');
Route::post('cart', 'ProductsController@getInsert');

Route::prefix('menu')->group(function() {
    Route::get('/', 'MenuController@getIndex');
    Route::get('/show/{id}', 'MenuController@getShow');
});