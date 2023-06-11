<?php

namespace Src\Modules\Blogs\Categories\Application\UseCase\Queries;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blogs\Categories\Domain\Contracts\CategoryRepositoryContract;

class GetCategoryUseCase
{
    private CategoryRepositoryContract $repository;

    public function __construct(
        private readonly ?string $slug
    )
    {
        $this->repository = app()->make(CategoryRepositoryContract::class);
    }

    /**
     * Obtiene la categoria y devuelve el modelo consultado
     *
     * @return Model|Collection|Builder
     */
    public function __invoke(): Model|Collection|Builder
    {
        return $this->repository->getCategory($this->slug);
    }
}
