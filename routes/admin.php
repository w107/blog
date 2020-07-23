<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('posts', 'PostController');
    $router->resource('navigations', 'NavigationController');
    $router->resource('settings', 'SettingController');
    $router->resource('tags', 'TagController');
    $router->resource('categories', 'CategoryController');
});
