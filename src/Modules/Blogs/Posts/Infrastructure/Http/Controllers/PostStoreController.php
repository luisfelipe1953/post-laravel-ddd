<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Posts\Infrastructure\SavePost;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;
use Src\Modules\Blogs\Posts\Application\UseCases\Commands\SavePostUseCase;

class PostStoreController extends Controller
{
    /**
     * Valida que el request se cumpla sus requisitos.
     * Crea el PostModel y sus relaciones.
     * Redirecciona a la ruta designada.
     *
     * @param PostRequest $request
     * @return Redirector|RedirectResponse
     */
    public function __invoke(PostRequest $request): Redirector|RedirectResponse
    {
        $url = null;

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
        }

        (new SavePostUseCase(
            $request->only([
                'title',
                'slug',
                'extract',
                'body',
                'status',
                'category_id',
                'user_id',
                'tags',
            ]),
            $url
        ))->__invoke();

        return redirect()->route('admin.post.index')->with('create', 'El post se creó con éxito.');
    }
}
