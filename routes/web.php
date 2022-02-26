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

//datasets
$router->get('dataset', 'DatasetController@show');
$router->get('dataset/{id}', 'DatasetController@get');
$router->delete('dataset/{id}', 'DatasetController@delete');
$router->put('dataset', 'DatasetController@update');
$router->post('dataset', 'DatasetController@create');

//applications
$router->get('application', 'ApplicationController@show');
$router->get('application/{id}', 'ApplicationController@get');
$router->delete('application/{id}', 'ApplicationController@delete');
$router->put('application', 'ApplicationController@update');
$router->post('application', 'ApplicationController@create');

//reviews
$router->get('review', 'ReviewController@show');
$router->get('review/{id}', 'ReviewController@get');
$router->delete('review/{id}', 'ReviewController@delete');
$router->put('review', 'ReviewController@update');
$router->post('review', 'ReviewController@create');

//reward_user
$router->get('reward_user', 'RewardUserController@show');
//$router->get('reward_user/{id}', 'RewardUserController@get');
//$router->delete('review/{id}', 'RewardUserController@delete');
$router->put('reward_user', 'RewardUserController@update');
$router->post('reward_user', 'RewardUserController@create');
