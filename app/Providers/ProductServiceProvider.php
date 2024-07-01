<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class,
            ProductRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
