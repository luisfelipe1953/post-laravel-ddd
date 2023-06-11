<?php

namespace Src\Modules\Blogs\Posts\Application\UseCases\Queries;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;

class GetActivePostsUseCase
{
    private PostRepositoryContract $repository;

    public function __construct(
       private readonly string $column,
       private readonly int $pages,
    )
    {
        $this->repository = app()->make(PostRepositoryContract::class);
    }

    /**
     * Retorna un paginador de todos los Posts Activos
     *
     * @return Paginator|Builder
     */
    public function __invoke(): Paginator|Builder
    {
        return $this->repository->getActivePosts($this->column, $this->pages);
    }
}
