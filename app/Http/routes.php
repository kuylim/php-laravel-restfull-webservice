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
    return ('Welcome to Online Shop Web Service');
});

Route::group(['prefix' => 'api'], function (){
   Route::group(['prefix' => 'users'], function (){

        Route::get('', array('middleware' => 'cors', 'uses' => 'UserController@allUsers'));

        Route::get('{id}', array('middleware' => 'cors', 'uses' => 'UserController@getUser'));

        Route::post('', array('middleware' => 'cors', 'uses' => 'UserController@saveUser'));

        Route::put('{id}', array('middleware' => 'cors', 'uses' => 'UserController@updateUser'));

        Route::delete('{id}', array('middleware' => 'cors', 'uses' => 'UserController@deleteUser'));

        Route::get('/search/{email}', array('middleware' => 'cors', 'uses' => 'UserController@getUserEmail'));

    });

   Route::group(['prefix' => 'products'], function (){

       Route::get('', array('middleware' => 'cors', 'uses' => 'ProductController@allProducts'));

       Route::post('', array('middleware' => 'cors', 'uses' => 'ProductController@saveProduct'));

       Route::get('{id}', array('middleware' => 'cors', 'uses' => 'ProductController@getProduct'));

       Route::put('{id}', array('middleware' => 'cors', 'uses' => 'ProductController@updateProduct'));

       Route::delete('{id}', array('middleware' => 'cors', 'uses' => 'ProductController@deleteProduct'));

       Route::get('/search/{name}', array('middleware' => 'cors', 'uses' => 'ProductController@getProductName'));

   });

   Route::group(['prefix' => 'categories'], function (){

       Route::get('', array('middleware' => 'cors', 'uses' => 'CategoryController@allCategories'));

       Route::get('{id}', array('middleware' => 'cors', 'uses' => 'CategoryController@getCategory'));

       Route::post('', array('middleware' => 'cors', 'uses' => 'CategoryController@saveCategory'));

       Route::put('{id}', array('middleware' => 'cors', 'uses' => 'CategoryController@updateCategory'));

       Route::delete('{id}', array('middleware' => 'cors', 'uses' => 'CategoryController@deleteCategory'));

       Route::get('/search/{name}', array('middleware' => 'cors', 'uses' => 'CategoryController@getCategoryName'));

       Route::get('/{id}/products', array('middleware' => 'cors', 'uses' => 'CategoryController@getProductByCategory'));

   });
});



