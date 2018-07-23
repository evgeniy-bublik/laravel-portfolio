<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/contacts', function() {
    return view('contacts');
})->name('contacts');

Route::group(['prefix' => '/posts'], function() {

    Route::get('/', 'Post\PostController@index')->name('posts.index');

    Route::get('/item', function() {
        return view('post.item');
    })->name('posts.item');

});

Route::group(['prefix' => '/portfolio'], function() {

    Route::get('/', function() {
        return view('portfolio.index');
    })->name('portfolio.index');

    Route::get('/item', function() {
        return view('portfolio.item');
    })->name('portfolio.item');

});