<?php

namespace Src\Modules\Blogs\Posts\Application\UseCases\Commands;

use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;

class DeletePostUseCase
{
    private PostRepositoryContract $repository;

    public function __construct(
        private readonly int $id
    )
    {
        $this->repository = app()->make(PostRepositoryContract::class);
    }

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function __invoke()
    {
        return $this->repository->deletePost($this->id);
    }
}
