<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Modules\Blogs\Posts\Application\UseCases\Queries\GetPostUseCase;
use Src\Modules\Blogs\Tags\Application\UseCase\Commands\GetAllTagsUseCase;
use Src\Modules\Blogs\Categories\Application\UseCase\Queries\GetAllCategoriesUseCase;

class PostEditController extends Controller
{
    /**
     * Obtiene el post, las colecciones de CategoryModel y TagModel y las devuelve a la vista.
     * Retorna la vista
     *
     * @param mixed $post
     * @return View
     */
    public function __invoke($post): View
    {
        $post = (new GetPostUseCase($post))->__invoke();
        $categories = (new GetAllCategoriesUseCase(true, 'name', 'id'))->__invoke();
        $tags = (new GetAllTagsUseCase())->__invoke();

        $this->authorize('author', $post);

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
