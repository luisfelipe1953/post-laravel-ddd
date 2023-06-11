<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Modules\Blogs\Posts\Application\UseCases\Queries\GetPostUseCase;
use Src\Modules\Blogs\Posts\Application\UseCases\Queries\GetRelatedPostsUseCase;

class PostShowController extends Controller
{
    /**
     * Muestra información detallada del post model solicitado.
     * Obtiene y muestra los posts relacionados.
     * Y valida que los posts que se consulten estén en estado "2".
     *
     * @param mixed $post
     * @return View
     */
    public function __invoke(mixed $post): View
    {
        $post = (new GetPostUseCase($post))->__invoke();
        $relatedPosts = (new GetRelatedPostsUseCase)->__invoke($post);
        $this->authorize('published', $post);

        return view('post.show', compact('post', 'relatedPosts'));
    }
}
