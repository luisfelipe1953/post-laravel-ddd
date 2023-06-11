<?php

namespace Src\Modules\Blogs\Categories\Application\UseCase\Queries;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Src\Modules\Blogs\Categories\Domain\Contracts\CategoryRepositoryContract;

class GetAllCategoriesUseCase
{
    private CategoryRepositoryContract $repository;

    public function __construct(
        private readonly bool $pluck = false,
        private readonly ?string $column = null,
        private readonly mixed $key = null
    ) {
        $this->repository = app()->make(CategoryRepositoryContract::class);
    }


    /**
     * Retorna una coleccion del modelo consultado
     *
     * @return Collection|SupportCollection
     */
    public function __invoke(): Collection|SupportCollection
    {
        return $this->repository->getAllCategories($this->pluck, $this->column, $this->key);
    }
}
