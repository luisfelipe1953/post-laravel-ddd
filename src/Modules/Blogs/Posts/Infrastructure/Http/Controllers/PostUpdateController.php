<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;
use Src\Modules\Blogs\Posts\Application\UseCases\Queries\GetPostUseCase;
use Src\Modules\Blogs\Posts\Application\UseCases\Commands\SavePostUseCase;

class PostUpdateController extends Controller
{
    /**
     * Valida que el request cumpla con sus requisitos.
     * Actualiza el registro almacenado.
     * Redirecciona a la ruta designada.
     *
     * @param PostRequest $request
     * @param integer $id
     * @return Redirector|RedirectResponse
     */
    public function __invoke(PostRequest $request, int $id): Redirector|RedirectResponse
    {
        $url = null;

        $post = (new GetPostUseCase($id))->__invoke();
        $this->authorize('author', $post);

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
        }

        (new SavePostUseCase($request, $url, $id))->__invoke();

        return redirect()->route('admin.post.index')->with('update', 'El post fue actualizado con éxito');
    }
}
