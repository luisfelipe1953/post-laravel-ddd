<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\HTTP\Controllers;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;
use Src\Categories\Infrastructure\SaveCategory;
use Src\Modules\Blogs\Categories\Domain\Mapper\CategoryMapper;
use Src\Modules\Blogs\Categories\Application\UseCase\Commands\SaveCategoryUseCase;

class CategoryUpdateController extends Controller
{
    /**
     * Valida que el request cumpla las condiciones.
     * Guarda el nuevo registro de la categoria.
     * Redirecciona a la ruta indicada.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function __invoke(CategoryRequest $request, int $id): RedirectResponse|Redirector
    {    
        $categoryDomanModel = CategoryMapper::fromRequest($request, $id);

       (new SaveCategoryUseCase($categoryDomanModel))->__invoke();

        return redirect()->route('admin.category.index')->with('update', 'La categoria se actualizó con éxito');
    }
}
