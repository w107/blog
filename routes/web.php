<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'        => config('blog.route.prefix'),
    'namespace'     => 'Inn20\Blog\Controllers',
    'middleware'    => ['blog'],
    'as'            => 'blog.',
], function (Router $router) {
    $router->get('/', 'PostController@index')->name('index');
    $router->get('posts/{post}', 'PostController@show')->name('posts.show');
    $router->get('categories/{category}', 'CategoryController@show')->name('categories.show');
    $router->get('tags/{tag:title}', 'TagController@show')->name('tags.show');
    $router->get('sitemap.txt', 'SitemapController@index')->name('sitemap.index');
});
