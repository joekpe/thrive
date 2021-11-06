<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //filter books by author
        Collection::macro('byAuthor', function ($author) {
            return $this->filter(function ($value) use ($author) {
                return $value->user_id == $author;
            });
        });

        //filter books by author
        Collection::macro('my_author_bio', function ($author) {
            return $this->filter(function ($value) use ($author) {
                return $value->user_id == $author;
            });
        });
    }
}
