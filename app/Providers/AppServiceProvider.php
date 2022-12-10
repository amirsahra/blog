<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        // ...
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Builder::macro('whereLike', function(string $attribute, string $search) {
            return $this->orWhere($attribute, 'LIKE', "%{$search}%");
        });
//        Builder::macro('whereIn', function(string $attribute, string $search) {
//            return $this->where($attribute, 'IN', "{$search}");
//        });
    }
}
