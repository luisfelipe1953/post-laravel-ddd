<?php

namespace Src\Modules\Blogs\Tags\Application\UseCase\Commands;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blogs\Tags\Domain\Contract\TagRepositoryContract;

class GetTagUseCase
{
    private TagRepositoryContract $repository;

    public function __construct()
    {
        $this->repository = app()->make(TagRepositoryContract::class);
    }

    /**
     * Obtiene el Model Tag y devuelve el Model consultado
     *
     * @param mixed $tag
     * @return Model|Collection|Builder
     */
    public function execute(mixed $tag): Model|Collection|Builder
    {
        return $this->repository->getTag($tag);
    }
}
