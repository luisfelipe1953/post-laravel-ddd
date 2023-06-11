<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\HTTP\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;
use Src\Modules\Blogs\Categories\Domain\Mapper\CategoryMapper;
use Src\Modules\Blogs\Categories\Application\UseCase\Commands\SaveCategoryUseCase;

class CategoryStoreController extends Controller
{
    /**
     * Valida que el request cumpla las condiciones.
     * Guarda el registro de la nueva categoria.
     * Redirecciona a la ruta indicada.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function __invoke(CategoryRequest $request): RedirectResponse|Redirector
    {   
        $category = CategoryMapper::fromRequest($request);

        (new SaveCategoryUseCase($category))->__invoke();

        return redirect()->route('admin.category.index')->with('create', 'La categoria se creó con éxito.');
    }
}
