<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Modules\Blogs\Posts\Application\UseCases\Queries\GetPostUseCase;
use Src\Modules\Blogs\Posts\Application\UseCases\Commands\DeletePostUseCase;

class PostDestroyController extends Controller
{
    /**
     * Obtiene el ModelPost y elimina su registro
     *
     * @param integer $id
     * @return Redirector|RedirectResponse
     */
    public function __invoke(int $id): Redirector|RedirectResponse
    {
        $post = (new GetPostUseCase($id))->__invoke();
        $this->authorize('author', $post);

        (new DeletePostUseCase($id))->__invoke();
        
        return redirect()->route('admin.post.index')->with('delete', 'El post se ha eliminado con exito');
    }
}
