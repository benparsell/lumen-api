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

$router->get('/devices', [
    'as' => 'home',
    'uses' => 'ExampleController@getDevices'
]);

$router->get('/devices/data/', [
    'as' => 'home',
    'uses' => 'ExampleController@getRecentDeviceData'
]);

$router->get('/devices/data/{id}', [
    'as' => 'data',
    'uses' => 'ExampleController@getThirtyResults'
]);
