<?php

namespace Src\Modules\Blogs\Tags\Application\UseCase\Commands;

use Src\Modules\Blogs\Tags\Domain\Contract\TagRepositoryContract;

class SaveTagUseCase
{
    private TagRepositoryContract $repository;

    public function __construct()
    {
        $this->repository = app()->make(TagRepositoryContract::class);
    }


    /**
     * Recibe el request por separado y almacena los registros
     *
     * @param mixed $reqName
     * @param mixed $reqSlug
     * @param mixed $reqColor
     * @param integer|null $id
     * @return void
     */
    public function execute($reqName, $reqSlug, $reqColor, ?int $id = null)
    {
        return $this->repository->save($reqName, $reqSlug, $reqColor, $id);
    }
}
