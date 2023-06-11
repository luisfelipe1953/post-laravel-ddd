<?php

namespace Src\Modules\Blogs\Tags\Application\UseCase\Commands;

use Src\Modules\Blogs\Tags\Domain\Contract\TagRepositoryContract;


class DeleteTagUseCase
{
    private TagRepositoryContract $repository;

    public function __construct()
    {
        $this->repository = app()->make(TagRepositoryContract::class);
    }


    /**
     * Obtiene el ModelTag y elimina su registro
     *
     * @param integer $id
     * @return void
     */
    public function execute(int $id)
    {
        return $this->repository->deleteTag($id);
    }
}
