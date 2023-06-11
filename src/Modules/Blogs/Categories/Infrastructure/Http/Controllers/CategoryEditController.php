<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\HTTP\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Modules\Blogs\Categories\Application\UseCase\Queries\GetCategoryUseCase;

class CategoryEditController extends Controller
{   
    /**
     * Obtiene el Model Category consultado y lo envia a la vista.
     *
     * @param mixed $slug
     * @return View
     */
    public function __invoke(mixed $slug): View
    {
        $category = (new GetCategoryUseCase($slug))->__invoke();

        return view('admin.category.edit', compact('category'));
    }
}
