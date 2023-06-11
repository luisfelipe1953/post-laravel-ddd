<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Modules\Blogs\Categories\Application\UseCase\Queries\GetCategoryUseCase;
use Src\Modules\Blogs\Posts\Application\UseCases\Queries\GetCategoryPostUseCase;

class CategoryController extends Controller
{
    /**
     * Muestra la vista con información detallada del param $slug asociado al Modelo.
     *
     * @param mixed $slug
     * @return View
     */
    public function __invoke(mixed $slug): View
    {
        $category = (new GetCategoryUseCase($slug))->__invoke();
        $posts = (new GetCategoryPostUseCase($category->id))->__invoke();

        return view('post.category', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
