<?php

namespace Src\Modules\Blogs\Tags\Application\UseCase\Commands;

use Illuminate\Pagination\Paginator;
use Src\Modules\Blogs\Tags\Domain\Contract\TagRepositoryContract;
use Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent\TagEloquentModel;

class GetPostsRelatedToTagsUseCase
{
    private TagRepositoryContract $repository;

    public function __construct(
        private readonly ?TagEloquentModel $tagEloquentModel
    )
    {
        $this->repository = app()->make(TagRepositoryContract::class);
    }
    
    /**
     * Obtiene un paginador con los Posts relacionados al TagModel recibido
     *
     * @return Paginator
     */
    public function __invoke(): Paginator
    {
        return $this->repository->getPostsRelatedToTags($this->tagEloquentModel);
    }
}
