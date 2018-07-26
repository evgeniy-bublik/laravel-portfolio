<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User\AboutMe;
use App\Models\User\SocialLink;
use App\Models\Post\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $oneDayMinutes = 60 * 24;

        View::share('aboutMe', Cache::remember('about-me', $oneDayMinutes, function () {
            return AboutMe::get()->pluck('value', 'key');
        }));

        View::share('socialLinks', Cache::remember('social-links', $oneDayMinutes, function () {
            return SocialLink::active()->get();
        }));

        View::share('latestPosts', Cache::remember('latest-posts', $oneDayMinutes, function () {
            return Post::latestPosts()->get();
        }));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
