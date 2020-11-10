<?php

namespace App\Providers;

use App\Models\BlogPost;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\View;

class LatestNewsProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->getLatestNews();
    }

    public function getLatestNews() {
        View::composer('main', function($view) {
//            $this->newsRepository = app(BlogPostRepository::class);
//            $latest_posts = $this->newsRepository->getLatestPosts();
            $latest_posts = BlogPost::where('is_published', true)->orderBy('id', 'desc')->limit(3)->get();
            $view->with('latest_posts', $latest_posts);
        });
    }
}
