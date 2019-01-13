<?php

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function() {

    Route::get('/', 'Admin\IndexController@index')->name('admin.index');
    Route::get('/about/me', 'Admin\AboutMeController@edit')->name('admin.about.me.edit');

    Route::group(['prefix' => '/ajax'], function() {
        Route::put('/save-about-me', 'Admin\AboutMeController@update')->name('admin.ajax.save.about.me');
    });

    Route::group(['prefix' => '/pages'], function() {
        Route::get('/', 'Admin\PageController@index')->name('admin.pages.index');
        Route::get('/ajax-data', 'Admin\PageController@getDataTable')->name('admin.pages.ajaxdata');
        Route::get('/edit/{page}', 'Admin\PageController@edit')->name('admin.pages.edit');
        Route::put('/update/{page}', 'Admin\PageController@update')->name('admin.pages.update');
    });

    Route::group(['prefix' => '/support-messages'], function() {
        Route::get('/', 'Admin\SupportController@index')->name('admin.support.messages.index');
        Route::get('/ajax-data', 'Admin\SupportController@getDataTable')->name('admin.support.messages.ajaxdata');
        Route::get('/view/{message}', 'Admin\SupportController@view')->name('admin.support.messages.view');
        Route::get('/answer/{message}', 'Admin\SupportController@formAnswer')->name('admin.support.messages.form.answer');
        Route::put('/answer/{message}', 'Admin\SupportController@answer')->name('admin.support.messages.answer');
        Route::delete('/delete/{message}', 'Admin\SupportController@delete')->name('admin.support.messages.delete');
    });

    Route::group(['prefix' => '/social-links'], function() {
        Route::get('/', 'Admin\SocialLinkController@index')->name('admin.social.links.index');
        Route::get('/ajax-data', 'Admin\SocialLinkController@getDataTable')->name('admin.social.links.ajaxdata');
        Route::get('/create', 'Admin\SocialLinkController@create')->name('admin.social.links.create');
        Route::post('/store', 'Admin\SocialLinkController@store')->name('admin.social.links.store');
        Route::get('/edit/{socialLink}', 'Admin\SocialLinkController@edit')->name('admin.social.links.edit');
        Route::put('/update/{socialLink}', 'Admin\SocialLinkController@update')->name('admin.social.links.update');
        Route::delete('/delete/{socialLink}', 'Admin\SocialLinkController@delete')->name('admin.social.links.delete');
    });

    Route::group(['prefix' => '/professional-skills'], function() {
        Route::get('/', 'Admin\ProfessionalSkillController@index')->name('admin.professional.skills.index');
        Route::get('/ajax-data', 'Admin\ProfessionalSkillController@getDataTable')->name('admin.professional.skills.ajaxdata');
        Route::get('/create', 'Admin\ProfessionalSkillController@create')->name('admin.professional.skills.create');
        Route::post('/store', 'Admin\ProfessionalSkillController@store')->name('admin.professional.skills.store');
        Route::get('/edit/{skill}', 'Admin\ProfessionalSkillController@edit')->name('admin.professional.skills.edit');
        Route::put('/update/{skill}', 'Admin\ProfessionalSkillController@update')->name('admin.professional.skills.update');
        Route::delete('/delete/{skill}', 'Admin\ProfessionalSkillController@delete')->name('admin.professional.skills.delete');
    });

    Route::group(['prefix' => '/portfolio'], function() {
        Route::group(['prefix' => '/categories'], function() {
            Route::get('/', 'Admin\Portfolio\CategoryController@index')->name('admin.portfolio.categories.index');
            Route::get('/ajax-data', 'Admin\Portfolio\CategoryController@getDataTable')->name('admin.portfolio.categories.ajaxdata');
            Route::get('/create', 'Admin\Portfolio\CategoryController@create')->name('admin.portfolio.categories.create');
            Route::post('/store', 'Admin\Portfolio\CategoryController@store')->name('admin.portfolio.categories.store');
            Route::get('/edit/{category}', 'Admin\Portfolio\CategoryController@edit')->name('admin.portfolio.categories.edit');
            Route::put('/update/{category}', 'Admin\Portfolio\CategoryController@update')->name('admin.portfolio.categories.update');
            Route::delete('/delete/{category}', 'Admin\Portfolio\CategoryController@delete')->name('admin.portfolio.categories.delete');
        });

        Route::group(['prefix' => '/works'], function() {
            Route::get('/', 'Admin\Portfolio\WorkController@index')->name('admin.portfolio.works.index');
            Route::get('/ajax-data', 'Admin\Portfolio\WorkController@getDataTable')->name('admin.portfolio.works.ajaxdata');
            Route::get('/create', 'Admin\Portfolio\WorkController@create')->name('admin.portfolio.works.create');
            Route::post('/store', 'Admin\Portfolio\WorkController@store')->name('admin.portfolio.works.store');
            Route::get('/edit/{work}', 'Admin\Portfolio\WorkController@edit')->name('admin.portfolio.works.edit');
            Route::put('/update/{work}', 'Admin\Portfolio\WorkController@update')->name('admin.portfolio.works.update');
            Route::delete('/delete/{work}', 'Admin\Portfolio\WorkController@delete')->name('admin.portfolio.works.delete');
        });
    });

    Route::group(['prefix' => '/blog'], function() {
        Route::group(['prefix' => '/categories'], function() {
            Route::get('/', 'Admin\Blog\CategoryController@index')->name('admin.blog.categories.index');
            Route::get('/ajax-data', 'Admin\Blog\CategoryController@getDataTable')->name('admin.blog.categories.ajaxdata');
            Route::get('/create', 'Admin\Blog\CategoryController@create')->name('admin.blog.categories.create');
            Route::post('/store', 'Admin\Blog\CategoryController@store')->name('admin.blog.categories.store');
            Route::get('/edit/{category}', 'Admin\Blog\CategoryController@edit')->name('admin.blog.categories.edit');
            Route::put('/update/{category}', 'Admin\Blog\CategoryController@update')->name('admin.blog.categories.update');
            Route::delete('/delete/{category}', 'Admin\Blog\CategoryController@delete')->name('admin.blog.categories.delete');
        });

        Route::group(['prefix' => '/tags'], function() {
            Route::get('/', 'Admin\Blog\TagController@index')->name('admin.blog.tags.index');
            Route::get('/ajax-data', 'Admin\Blog\TagController@getDataTable')->name('admin.blog.tags.ajaxdata');
            Route::get('/create', 'Admin\Blog\TagController@create')->name('admin.blog.tags.create');
            Route::post('/store', 'Admin\Blog\TagController@store')->name('admin.blog.tags.store');
            Route::get('/edit/{tag}', 'Admin\Blog\TagController@edit')->name('admin.blog.tags.edit');
            Route::put('/update/{tag}', 'Admin\Blog\TagController@update')->name('admin.blog.tags.update');
            Route::delete('/delete/{tag}', 'Admin\Blog\TagController@delete')->name('admin.blog.tags.delete');
        });

        Route::group(['prefix' => '/posts'], function() {
            Route::get('/', 'Admin\Blog\PostController@index')->name('admin.blog.posts.index');
            Route::get('/ajax-data', 'Admin\Blog\PostController@getDataTable')->name('admin.blog.posts.ajaxdata');
            Route::get('/create', 'Admin\Blog\PostController@create')->name('admin.blog.posts.create');
            Route::post('/store', 'Admin\Blog\PostController@store')->name('admin.blog.posts.store');
            Route::get('/edit/{post}', 'Admin\Blog\PostController@edit')->name('admin.blog.posts.edit');
            Route::put('/update/{post}', 'Admin\Blog\PostController@update')->name('admin.blog.posts.update');
            Route::delete('/delete/{post}', 'Admin\Blog\PostController@delete')->name('admin.blog.posts.delete');
        });

        Route::group(['prefix' => '/comments'], function() {
            Route::get('/', 'Admin\Blog\CommentController@index')->name('admin.blog.comments.index');
            Route::get('/ajax-data', 'Admin\Blog\CommentController@getDataTable')->name('admin.blog.comments.ajaxdata');
            Route::get('/edit/{comment}', 'Admin\Blog\CommentController@edit')->name('admin.blog.comments.edit');
            Route::put('/update/{comment}', 'Admin\Blog\CommentController@update')->name('admin.blog.comments.update');
            Route::delete('/delete/{comment}', 'Admin\Blog\CommentController@delete')->name('admin.blog.comments.delete');
        });
    });
});