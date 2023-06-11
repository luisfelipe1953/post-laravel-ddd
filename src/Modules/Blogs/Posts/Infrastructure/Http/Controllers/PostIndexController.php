<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Modules\Blogs\Posts\Application\UseCases\Queries\GetActivePostsUseCase;


class PostIndexController extends Controller
{
    /**
     * Muestra la vista principal de todos los posts activos, ordenados por ID y paginado.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $posts = (New GetActivePostsUseCase('id', 10))->__invoke();

        return view('post.index', compact('posts'));
    }
}
