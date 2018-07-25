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

Route::get('/', 'IndexController@index')->name('index');

Route::get('/contacts', function() {
    return view('contacts');
})->name('contacts');

Route::group(['prefix' => '/posts'], function() {

    Route::get('/', 'Post\PostController@index')->name('posts.index');
    Route::get('/{slug}', 'Post\PostController@item')->name('posts.item');
    Route::get('/tag/{tagSlug}', 'Post\PostController@byTag')->name('posts.by.tag');
    Route::get('/category/{categorySlug}', 'Post\PostController@byCategory')->name('posts.by.category');
    Route::post('/add-comment/{post}', 'Post\PostController@addComment')->name('posts.add.comment');

});

Route::group(['prefix' => '/portfolio'], function() {

    Route::get('/', function() {
        return view('portfolio.index');
    })->name('portfolio.index');

    Route::get('/item', function() {
        return view('portfolio.item');
    })->name('portfolio.item');

});

Route::post('/supports/send', 'IndexController@storeSupportMessage')->name('supports.send');