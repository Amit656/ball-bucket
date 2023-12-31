<?php

namespace App\Providers;

use App\Repository\BallRepository;
use App\Repository\IndexRepository;
use App\Repository\BucketRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\BallRepositoryInterface;
use App\Repository\BucketSuggestRepository;
use App\Repository\IndexRepositoryInterface;
use App\Repository\BucketRepositoryInterface;
use App\Repository\BucketSuggestRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IndexRepositoryInterface::class, IndexRepository::class);
        $this->app->bind(BucketRepositoryInterface::class, BucketRepository::class);
        $this->app->bind(BallRepositoryInterface::class, BallRepository::class);
        $this->app->bind(BucketSuggestRepositoryInterface::class, BucketSuggestRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
