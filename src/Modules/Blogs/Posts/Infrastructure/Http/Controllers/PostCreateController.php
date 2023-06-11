<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Src\Modules\Blogs\Tags\Application\UseCase\Commands\GetAllTagsUseCase;
use Src\Modules\Blogs\Categories\Application\UseCase\Queries\GetAllCategoriesUseCase;

class PostCreateController extends Controller
{   
    /**
     * Obtiene la coleccion de CategoryModel y TagModel pasandolos a la vista.
     * Devuelve la vista para crear un PostModel.
     *
     */
    public function __invoke(): View
    {   
        $categories = (new GetAllCategoriesUseCase(true, 'name', 'id'))->__invoke();

        $tags = (new GetAllTagsUseCase())->__invoke();

        return view('admin.post.create', compact('categories', 'tags'));
    }
}
