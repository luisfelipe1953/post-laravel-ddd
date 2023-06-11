<?php

namespace Src\Modules\Blogs\Categories\Application\UseCase\Commands;

use Src\Modules\Blogs\Categories\Domain\Contracts\CategoryRepositoryContract;

class DeleteCategoryUseCase
{
    private CategoryRepositoryContract $repository;

    public function __construct(
        private readonly int $id
    )
    {
        $this->repository = app()->make(CategoryRepositoryContract::class);
    }


    /**
     * Obtiene el Modelo y lo elimina
     *
     * @return void
     */
    public function __invoke()
    {
        return $this->repository->deleteCategory($this->id);
    }
}
