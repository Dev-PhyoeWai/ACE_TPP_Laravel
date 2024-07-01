<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class,
            ArticleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
