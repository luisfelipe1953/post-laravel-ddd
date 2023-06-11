<?php

namespace Src\Modules\Blogs\Tags\Application\UseCase\Commands;

use Illuminate\Support\Collection;
use Src\Modules\Blogs\Tags\Domain\Contract\TagRepositoryContract;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class GetAllTagsUseCase
{
    private TagRepositoryContract $repository;

    public function __construct(
        private readonly bool $pluck = false, 
        private readonly ?string $column = null, 
        private readonly mixed $key = null
    )
    {
        $this->repository = app()->make(TagRepositoryContract::class);
    }

    /**
     * Retorna una coleccion del modelo consultado
     *
     * @return EloquentCollection|Collection
     */
    public function __invoke(): EloquentCollection|Collection
    {
        return $this->repository->getAllTags($this->pluck, $this->column, $this->key);
    }
}
