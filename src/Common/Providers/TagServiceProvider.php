<?php

namespace Src\Common\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Modules\Blogs\Tags\Domain\Contract\TagRepositoryContract;
use Src\Modules\Blogs\Tags\Application\UseCase\Commands\GetAllTagsUseCase;
use Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent\Repositories\TagRepository;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->when(GetPostsRelatedToTagsUseCase::class)
        //     ->needs(TagRepositoryContract::class)
        //     ->give(TagRepository::class);
        $this->app->bind(
            TagRepositoryContract::class,
            TagRepository::class
        );
        // $this->app->when(SaveTagUseCase::class)
        //     ->needs(TagRepositoryContract::class)
        //     ->give(TagRepository::class);
        // $this->app->when(GetTagUseCase::class)
        //     ->needs(TagRepositoryContract::class)
        //     ->give(TagRepository::class);
        // $this->app->when(DeleteTagUseCase::class)
        //     ->needs(TagRepositoryContract::class)
        //     ->give(TagRepository::class);
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
