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


$router->group(['prefix'=>'auth'],function() use ($router){
	$router->post('/register','AuthController@register');
	$router->post('/login','AuthController@login');
	$router->get('/user/{id}','UserController@show');
});

$router->group(['prefix'=>'menu'],function() use ($router){
	$router->post('/save_menu','MenuController@save_menu');
	$router->get('/get_one/{id}','MenuController@get_one');
	$router->put('/update/{id}','MenuController@update');
});

$router->group(['prefix'=>'role'],function() use ($router){
	$router->post('/save_role','RoleController@save_role');
	$router->get('/get_one/{id}','RoleController@get_one');
	$router->put('/update/{id}','RoleController@update');
});

$router->group(['prefix'=>'userrole'],function() use ($router){
	$router->post('/save_user_role','UserroleController@save_user_role');
	$router->get('/get_one/{id}','UserroleController@get_one');
	$router->put('/update/{id}','UserroleController@update');
});

$router->group(['prefix'=>'rolemenu'],function() use ($router){
	$router->post('/save_role_menu','RolemenuController@save_role_menu');
	$router->get('/get_one/{id}','RolemenuController@get_one');
	$router->put('/update/{id}','RolemenuController@update');
});

$router->group(['prefix'=>'news'],function() use ($router){
	$router->post('/save_news','NewsController@save_news');
	$router->get('/show_all/{start}/{length}','NewsController@show_all');
	$router->get('/get_one/{id}','NewsController@get_one');
	$router->put('/update/{id}','NewsController@update');
	$router->post('/delete','NewsController@delete');
});

$router->group(['prefix'=>'newsdetail'],function() use ($router){
	$router->post('/save_newsdetil','NewsdetailController@save_newsdetail');
	$router->get('/show/{id}','NewsdetailController@show');
});
