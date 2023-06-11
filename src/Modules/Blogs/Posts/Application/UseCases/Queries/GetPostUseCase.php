<?php

namespace Src\Modules\Blogs\Posts\Application\UseCases\Queries;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;

class GetPostUseCase
{
    private PostRepositoryContract $repository;

    public function __construct(
        private readonly int $id
    )
    {
        $this->repository = app()->make(PostRepositoryContract::class);
    }

    /**
     * Obtiene el Model Post y devuelve el Model consultado
     *
     * @return Model|Collection|Builder
     */
    public function __invoke(): Model|Collection|Builder
    {
        return $this->repository->getPost($this->id);
    }
}
