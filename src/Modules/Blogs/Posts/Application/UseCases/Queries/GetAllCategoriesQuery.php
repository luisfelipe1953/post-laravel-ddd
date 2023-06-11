<?php

namespace Src\Modules\Blogs\Posts\Application\UseCases\Queries;

use Src\Modules\Blogs\Posts\Domain\Services\CategoryService;
use Src\Modules\Blogs\Posts\Domain\Contracts\PostRepositoryContract;

class GetAllCategoriesQuery
{
    private PostRepositoryContract $repository;
    private CategoryService $CategoryService;
    
    public function __construct()
    {
        $this->repository = app()->make(PostRepositoryContract::class);
        $this->CategoryService = new CategoryService();
    }
    
    /**
     * obtener todos los tafs
     */
    public function __invoke()
    {
        return $this->CategoryService->obtainCategories();
    }
}
