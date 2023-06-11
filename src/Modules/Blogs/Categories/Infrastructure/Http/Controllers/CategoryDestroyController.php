<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\HTTP\Controllers;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Categories\Infrastructure\DeleteCategory;
use Src\Modules\Blogs\Categories\Application\UseCase\Commands\DeleteCategoryUseCase;

class CategoryDestroyController extends Controller
{
    /**
     * Elimina el registro del Model Category consultado
     *
     * @param integer $id
     * @return RedirectResponse|Redirector
     */
    public function __invoke(int $id): RedirectResponse|Redirector
    {
       (new DeleteCategoryUseCase($id))->__invoke();

        return redirect()->route('admin.category.index')->with('delete', 'La categoria se ha eliminado');
    }
}
