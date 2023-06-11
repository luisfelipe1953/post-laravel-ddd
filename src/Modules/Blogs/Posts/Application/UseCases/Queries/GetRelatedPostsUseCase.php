<?php

namespace Src\Modules\Blogs\Posts\Application\UseCases\Queries;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;

class GetRelatedPostsUseCase
{
    private PostRepositoryContract $repository;

    public function __construct()
    {
        $this->repository = app()->make(PostRepositoryContract::class);
    }

    /**
     * Obtiene el PostModel relacionado con CategoryModel
     *
     * @param mixed $post
     * @return Model|Builder|Collection
     */
    public function __invoke($post): Model|Builder|Collection
    {
        return $this->repository->getRelatedPosts($post);
    }
}
