<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('products',  ['uses' => 'ProductController@index']);
  
    $router->get('products/{id}', ['uses' => 'ProductController@show']);
  
    $router->post('products', ['uses' => 'ProductController@store']);
  
    $router->delete('products/{id}', ['uses' => 'ProductController@destroy']);
  
    $router->put('products/{id}', ['uses' => 'ProductController@update']);

    $router->get('users',  ['uses' => 'UserController@index']);
  
    $router->get('users/{id}', ['uses' => 'UserController@show']);
  
    $router->post('users', ['uses' => 'UserController@store']);
  
    $router->delete('users/{id}', ['uses' => 'UserController@destroy']);
  
    $router->put('users/{id}', ['uses' => 'UserController@update']);

    $router->get('transactions',  ['uses' => 'TransactionController@index']);
  
    $router->get('transactions/{id}', ['uses' => 'TransactionController@show']);
  
    $router->post('transactions', ['uses' => 'TransactionController@store']);
  
    $router->delete('transactions/{id}', ['uses' => 'TransactionController@destroy']);
  
    $router->put('transactions/{id}', ['uses' => 'TransactionController@update']);
});