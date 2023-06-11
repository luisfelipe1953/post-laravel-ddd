<?php

namespace Src\Modules\Blogs\Posts\Application\UseCases\Queries;

use Illuminate\Pagination\Paginator;
use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;

class GetCategoryPostUseCase
{
    private PostRepositoryContract $repository;

    public function __construct(
        private readonly int $id
    )
    {
        $this->repository = app()->make(PostRepositoryContract::class);
    }

    /**
     * Obtiene una paginacion del PostModel consultado relacionado a la categoria_id
     *
     * @param integer $id
     * @return Paginator
     */
    public function __invoke(): Paginator
    {
        return $this->repository->getCategoryPost($this->id);
    }
}
