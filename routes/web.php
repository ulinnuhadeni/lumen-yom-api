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
    return 'This API was Started';
});

//Accomodation Routes
$router->group(['prefix' => 'accomodation'], function () use ($router) {
    $router->get('/', 'AccomodationController@index');
    $router->get('/{params}', 'AccomodationController@show');
    $router->post('/create', 'AccomodationController@store');
    $router->put('/update/{id}', 'AccomodationController@update');
    $router->delete('/{id}', 'AccomodationController@destroy');
});

//Accomodation Type Routes
$router->group(['prefix' => 'type'], function () use ($router) {
    $router->get('/', 'PropertyTypeController@index');
    $router->get('/{params}', 'PropertyTypeController@show');
    $router->post('/create', 'PropertyTypeController@store');
    $router->put('/update/{id}', 'PropertyTypeController@update');
    $router->delete('/{id}', 'PropertyTypeController@destroy');
});

//Accomodation Contact Routes
$router->group(['prefix' => 'contact'], function () use ($router) {
    $router->get('/', 'PropertyContactController@index');
    $router->get('/{params}', 'PropertyContactController@show');
    $router->post('/create', 'PropertyContactController@store');
    $router->put('/update/{id}', 'PropertyContactController@update');
    $router->delete('/{id}', 'PropertyContactController@destroy');
});
