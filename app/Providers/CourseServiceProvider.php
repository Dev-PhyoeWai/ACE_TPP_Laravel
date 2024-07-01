<?php

namespace App\Providers;

use App\Repositories\CourseRepository;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(CourseRepositoryInterface::class,
            CourseRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
