<?php

namespace Src\Modules\Blogs\Categories\Application\UseCase\Commands;

use Src\Modules\Blogs\Categories\Domain\Contracts\CategoryRepositoryContract;
use Src\Modules\Blogs\Categories\Domain\Model\Category;

class SaveCategoryUseCase
{
    private CategoryRepositoryContract $repository;

    public function __construct(
        private readonly ?Category $category
    )
    {
        $this->repository = app()->make(CategoryRepositoryContract::class);
    }

    /**
     * Recibe el request por separado y almacena los registros.
     *
     * @param $reqName
     * @param $reqSlug
     * @param integer|null $id
     * @return void
     */
    public function __invoke()
    {
        return $this->repository->save($this->category);
    }
}
