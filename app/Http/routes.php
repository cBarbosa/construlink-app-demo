<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'],function(){
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

/*
Route::get('admin/categories', function () {

    //$repository = app()->make('ConstruLink\Repositories\CategoryRepository');
    //return $repository->all();

    echo "<h1>Olá mundo!</h1>>";
});
*/

Route::group(['middleware' => 'auth.checkrole:admin', 'prefix' => 'admin', 'as' => 'admin.'],function(){
    Route::get('categories',                ['as'=>'categories.index'   , 'uses' => 'CategoriesController@index']);
    Route::get('categories/edit/{id}',      ['as'=>'categories.edit'    , 'uses' => 'CategoriesController@edit']);
    Route::post('categories/update/{id}',   ['as'=>'categories.update'  , 'uses' => 'CategoriesController@update']);
    Route::get('categories/create',         ['as'=>'categories.create'  , 'uses' => 'CategoriesController@create']);
    Route::post('categories/store',         ['as'=>'categories.store'   , 'uses' => 'CategoriesController@store']);

    Route::get('clients',                   ['as'=>'clients.index'      , 'uses' => 'ClientsController@index']);
    Route::get('clients/edit/{id}',         ['as'=>'clients.edit'       , 'uses' => 'ClientsController@edit']);
    Route::post('clients/update/{id}',      ['as'=>'clients.update'     , 'uses' => 'ClientsController@update']);
    Route::get('clients/create',            ['as'=>'clients.create'     , 'uses' => 'ClientsController@create']);
    Route::post('clients/store',            ['as'=>'clients.store'      , 'uses' => 'ClientsController@store']);

    Route::get('products',                  ['as'=>'products.index'     , 'uses' => 'ProductsController@index']);
    Route::get('products/edit/{id}',        ['as'=>'products.edit'      , 'uses' => 'ProductsController@edit']);
    Route::post('products/update/{id}',     ['as'=>'products.update'    , 'uses' => 'ProductsController@update']);
    Route::get('products/create',           ['as'=>'products.create'    , 'uses' => 'ProductsController@create']);
    Route::post('products/store',           ['as'=>'products.store'     , 'uses' => 'ProductsController@store']);
    Route::get('products/destroy/{id}',     ['as'=>'products.destroy'   , 'uses' => 'ProductsController@destroy']);

    Route::get('orders',                    ['as'=>'orders.index'       , 'uses' => 'OrdersController@index']);
    Route::get('orders/{id}',               ['as'=>'orders.edit'        , 'uses' => 'OrdersController@edit']);
    Route::post('orders/update/{id}',        ['as'=>'orders.update'     , 'uses' => 'OrdersController@update']);

    Route::get('cupoms',                    ['as'=>'cupoms.index'       , 'uses' => 'CupomsController@index']);
    Route::get('cupoms/create',             ['as'=>'cupoms.create'      , 'uses' => 'CupomsController@create']);
    Route::post('cupoms/store',             ['as'=>'cupoms.store'       , 'uses' => 'CupomsController@store']);
});

Route::group(['middleware' => 'auth.checkrole:client', 'prefix' => 'customer', 'as' => 'customer.'],function(){
    Route::get('order',                     ['as'=>'order.index'        , 'uses' => 'CheckoutsController@index']);
    Route::get('order/create',             ['as'=>'order.create'        , 'uses' => 'CheckoutsController@create']);
    Route::post('order/store',             ['as'=>'order.store'        , 'uses' => 'CheckoutsController@store']);
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware' => 'oauth', 'prefix' => 'api', 'as' => 'api.'],function(){

    Route::group(['middleware' => 'oauth.checkrole:client', 'prefix' => 'client', 'as' => 'client.'],function(){

    });

    Route::group(['middleware' => 'oauth.checkrole:deliveryman', 'prefix' => 'deliveryman', 'as' => 'api.'],function(){

    });


    Route::get('pedidos', function(){
        return [
            'id' => 1
            , 'client' => 'Charlie Brown'
            , 'total' => 10
        ];
    });
});