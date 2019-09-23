<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User\{AboutMe, SocialLink};
use App\Models\Blog\Post;
use App\Models\Portfolio\Work;
use Illuminate\Support\Facades\Cache;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $oneDayMinutes = 60 * 24;

        $aboutMe = Cache::remember('about-me', $oneDayMinutes, function () {
            return AboutMe::get()->pluck('value', 'key');
        });

        $socialLinks = Cache::remember('social-links', $oneDayMinutes, function () {
            return SocialLink::active()->get();
        });

        $latestPosts = Cache::remember('latest-posts', $oneDayMinutes, function () {
            return Post::latestPosts()->get();
        });

        $latestWorks = Cache::remember('latest-works', $oneDayMinutes, function () {
            return Work::latestWorks()->get();
        });

        View::composer('*', function ($view) use ($aboutMe, $socialLinks, $latestPosts, $latestWorks) {
            $view->with('aboutMe', $aboutMe);
            $view->with('socialLinks', $socialLinks);
            $view->with('latestPosts', $latestPosts);
            $view->with('latestWorks', $latestWorks);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
