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

/** @var \Laravel\Lumen\Routing\Router $router */
$router->group(['prefix' => 'clients'], function () use ($router) {
    $router->post('/uploadFile', 'ClientController@uploadFile');
    $router->get('/findByPaginate/{page}', 'ClientController@findByPaginate');
    $router->get('/findGraphItems', 'ClientController@findGraphItems');
});
/**
 * Always the last route! Loads Vue Application.
 */
$router->get('/{route:.*}/', function () {
    return view('app');
});
