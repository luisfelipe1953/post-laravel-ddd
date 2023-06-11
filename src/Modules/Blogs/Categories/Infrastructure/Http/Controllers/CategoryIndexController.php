<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\HTTP\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Modules\Blogs\Categories\Application\UseCase\Queries\GetAllCategoriesUseCase;

class CategoryIndexController extends Controller
{
    /**
     * Obtiene una colecion de todas las categorias a la vista.
     * Retorna la vista.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $categories = (new GetAllCategoriesUseCase())->__invoke();

        return view('admin.category.index', compact('categories'));
    }
}
