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
    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
        $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
        $router->post('authors', ['uses' => 'AuthorController@create']);
        $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
        $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
    });

    $router->group(['prefix' => 'users', 'middleware' => 'cors'], function () use ($router) {
        $router->post('add',  'UsersController@add');
        $router->get('view/{id}', 'UsersController@view');
        $router->put('edit/{id}', 'UsersController@edit');
        $router->delete('delete/{id}', 'UsersController@delete');
        $router->get('index', 'UsersController@index');
    });
});
