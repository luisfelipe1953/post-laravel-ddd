<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\HTTP\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class CategoryCreateController extends Controller
{
    /**
     * Retorna la vista para crear una categoria
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('admin.category.create');
    }
}
