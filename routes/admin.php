<?php

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');

Route::group(['prefix' => '/admin', 'middleware' => 'auth', 'namespace' => 'Admin', 'as' => 'admin.'], function() {

    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/about-me', 'User\AboutMeController@edit')->name('about.me.edit');

    Route::group(['prefix' => '/ajax'], function() {
        Route::put('/save-about-me', 'User\AboutMeController@update')->name('ajax.save.about.me');
    });

    Route::group(['prefix' => '/pages', 'namespace' => 'Core', 'as' => 'pages.'], function() {
        Route::get('/', 'PageController@index')->name('index');
        Route::get('/ajax-data', 'PageController@getDataTable')->name('ajaxdata');
        Route::get('/edit/{page}', 'PageController@edit')->name('edit');
        Route::put('/update/{page}', 'PageController@update')->name('update');
    });

    Route::group(['prefix' => '/support-messages'], function() {
        Route::get('/', 'SupportController@index')->name('support.messages.index');
        Route::get('/ajax-data', 'SupportController@getDataTable')->name('support.messages.ajaxdata');
        Route::get('/view/{message}', 'SupportController@view')->name('support.messages.view');
        Route::get('/answer/{message}', 'SupportController@formAnswer')->name('support.messages.form.answer');
        Route::put('/answer/{message}', 'SupportController@answer')->name('support.messages.answer');
        Route::delete('/delete/{message}', 'SupportController@delete')->name('support.messages.delete');
    });

    Route::group(['prefix' => '/social-links', 'namespace' => 'User', 'as' => 'social_links.'], function() {
        Route::get('/', 'SocialLinkController@index')->name('index');
        Route::get('/ajax-data', 'SocialLinkController@getDataTable')->name('ajaxdata');
        Route::get('/create', 'SocialLinkController@create')->name('create');
        Route::post('/store', 'SocialLinkController@store')->name('store');
        Route::get('/edit/{socialLink}', 'SocialLinkController@edit')->name('edit');
        Route::put('/update/{socialLink}', 'SocialLinkController@update')->name('update');
        Route::delete('/delete/{socialLink}', 'SocialLinkController@delete')->name('delete');
    });

    Route::group(['prefix' => '/professional-skills', 'namespace' => 'User', 'as' => 'professional_skills.'], function() {
        Route::get('/', 'ProfessionalSkillController@index')->name('index');
        Route::get('/ajax-data', 'ProfessionalSkillController@getDataTable')->name('ajaxdata');
        Route::get('/create', 'ProfessionalSkillController@create')->name('create');
        Route::post('/store', 'ProfessionalSkillController@store')->name('store');
        Route::get('/edit/{skill}', 'ProfessionalSkillController@edit')->name('edit');
        Route::put('/update/{skill}', 'ProfessionalSkillController@update')->name('update');
        Route::delete('/delete/{skill}', 'ProfessionalSkillController@delete')->name('delete');
    });

    Route::group(['prefix' => '/portfolio', 'namespace' => 'Portfolio', 'as' => 'portfolio.'], function() {
        Route::group(['prefix' => '/categories', 'as' => 'categories.'], function() {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('/ajax-data', 'CategoryController@getDataTable')->name('ajaxdata');
            Route::get('/create', 'CategoryController@create')->name('create');
            Route::post('/store', 'CategoryController@store')->name('store');
            Route::get('/edit/{category}', 'CategoryController@edit')->name('edit');
            Route::put('/update/{category}', 'CategoryController@update')->name('update');
            Route::delete('/delete/{category}', 'CategoryController@delete')->name('delete');
        });

        Route::group(['prefix' => '/works', 'as' => 'works.'], function() {
            Route::get('/', 'WorkController@index')->name('index');
            Route::get('/ajax-data', 'WorkController@getDataTable')->name('ajaxdata');
            Route::get('/create', 'WorkController@create')->name('create');
            Route::post('/store', 'WorkController@store')->name('store');
            Route::get('/edit/{work}', 'WorkController@edit')->name('edit');
            Route::put('/update/{work}', 'WorkController@update')->name('update');
            Route::delete('/delete/{work}', 'WorkController@delete')->name('delete');
        });
    });

    Route::group(['prefix' => '/blog', 'namespace' => 'Blog', 'as' => 'blog.'], function() {
        Route::group(['prefix' => '/categories', 'as' => 'categories.'], function() {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('/ajax-data', 'CategoryController@getDataTable')->name('ajaxdata');
            Route::get('/create', 'CategoryController@create')->name('create');
            Route::post('/store', 'CategoryController@store')->name('store');
            Route::get('/edit/{category}', 'CategoryController@edit')->name('edit');
            Route::put('/update/{category}', 'CategoryController@update')->name('update');
            Route::delete('/delete/{category}', 'CategoryController@delete')->name('delete');
        });

        Route::group(['prefix' => '/tags', 'as' => 'tags.'], function() {
            Route::get('/', 'TagController@index')->name('index');
            Route::get('/ajax-data', 'TagController@getDataTable')->name('ajaxdata');
            Route::get('/create', 'TagController@create')->name('create');
            Route::post('/store', 'TagController@store')->name('store');
            Route::get('/edit/{tag}', 'TagController@edit')->name('edit');
            Route::put('/update/{tag}', 'TagController@update')->name('update');
            Route::delete('/delete/{tag}', 'TagController@delete')->name('delete');
        });

        Route::group(['prefix' => '/posts', 'as' => 'posts.'], function() {
            Route::get('/', 'PostController@index')->name('index');
            Route::get('/ajax-data', 'PostController@getDataTable')->name('ajaxdata');
            Route::get('/create', 'PostController@create')->name('create');
            Route::post('/store', 'PostController@store')->name('store');
            Route::get('/edit/{post}', 'PostController@edit')->name('edit');
            Route::put('/update/{post}', 'PostController@update')->name('update');
            Route::delete('/delete/{post}', 'PostController@delete')->name('delete');
        });

        Route::group(['prefix' => '/comments', 'as' => 'comments.'], function() {
            Route::get('/', 'CommentController@index')->name('index');
            Route::get('/ajax-data', 'CommentController@getDataTable')->name('ajaxdata');
            Route::get('/edit/{comment}', 'CommentController@edit')->name('edit');
            Route::put('/update/{comment}', 'CommentController@update')->name('update');
            Route::delete('/delete/{comment}', 'CommentController@delete')->name('delete');
        });
    });
});