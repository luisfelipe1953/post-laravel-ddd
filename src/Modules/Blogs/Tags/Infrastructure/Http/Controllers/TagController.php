<?php

namespace Src\Modules\Blogs\Tags\Infrastructure\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent\TagEloquentModel;
use Src\Modules\Blogs\Tags\Application\UseCase\Commands\GetPostsRelatedToTagsUseCase;

class TagController extends Controller
{
    /**
     * Obtiene el TagModel consultado y devuelve todos las publicaciones con el tag relacionado.
     *
     * @param TagEloquentModel $tag
     * @return View
     */
    public function __invoke(TagEloquentModel $tag): View
    {
        $posts = (new GetPostsRelatedToTagsUseCase($tag))->__invoke();
        
        return view('post.tag', compact('posts', 'tag'));
    }
}
