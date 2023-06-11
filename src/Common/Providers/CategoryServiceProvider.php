<?php

namespace Src\Common\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Modules\Blogs\Categories\Domain\Contracts\CategoryRepositoryContract;
use Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent\Repositories\CategoryRepository;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryContract::class,
            CategoryRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
