<?php

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
    $router->get('items',  ['uses' => 'ItemController@showAllItems']);
  
    $router->get('items/{id}', ['uses' => 'ItemController@showOneItem']);
  
    $router->post('items', ['uses' => 'ItemController@create']);
  
    $router->delete('items/{id}', ['uses' => 'ItemController@delete']);
  
    $router->put('items/{id}', ['uses' => 'ItemController@update']);
  });