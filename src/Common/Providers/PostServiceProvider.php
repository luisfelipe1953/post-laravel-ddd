<?php

namespace Src\Common\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Posts\Application\GetPostUseCase;
use Src\Posts\Application\SavePostUseCase;
use Src\Posts\Application\DeletePostUseCase;
use Src\Posts\Application\GetUserPostsUseCase;
use Src\Posts\Application\GetActivePostsUseCase;
use Src\Posts\Application\GetCategoryPostUseCase;
use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;
use Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent\Repositories\PostRepository;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->when(GetActivePostsUseCase::class)
        //     ->needs(PostRepositoryContract::class)
        //     ->give(PostRepository::class);
        $this->app->bind(
            PostRepositoryContract::class,
            PostRepository::class
        );
        // $this->app->when(GetCategoryPostUseCase::class)
        //     ->needs(PostRepositoryContract::class)
        //     ->give(PostRepository::class);
        // $this->app->when(GetUserPostsUseCase::class)
        //     ->needs(PostRepositoryContract::class)
        //     ->give(PostRepository::class);
        // $this->app->when(SavePostUseCase::class)
        //     ->needs(PostRepositoryContract::class)
        //     ->give(PostRepository::class);
        // $this->app->when(DeletePostUseCase::class)
        //     ->needs(PostRepositoryContract::class)
        //     ->give(PostRepository::class);
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
