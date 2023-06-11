<?php

namespace Src\Modules\Blogs\Posts\Application\UseCases\Commands;

use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;

class SavePostUseCase
{
    private PostRepositoryContract $repository;

    public function __construct(
        private  mixed  $req,
        private  ?string  $url,
        private  int|null $id = null,
    ) {
        $this->repository = app()->make(PostRepositoryContract::class);
    }

    /**
     * Recibe el request y almacena los registros
     */
    public function __invoke()
    {
        return $this->repository->save($this->req, $this->url, $this->id);
    }
}
