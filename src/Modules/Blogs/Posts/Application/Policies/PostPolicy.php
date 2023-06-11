<?php

namespace Src\Modules\Blogs\Posts\Application\Policies;

use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;
use Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent\PostEloquentModel;


class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Valida que el autor del post sea el usuario autenticado.
     * Caso contrario responde con http 403
     *
     * @param User $user
     * @param PostModel $post
     * @return Response
     */
    public function author(UserEloquentModel $user, PostEloquentModel $post): Response
    {
        return $post->user_id == $user->id ?
            Response::allow() :
            Response::deny('No autorizado');
    }

    /**
     * Valida que el post que se ingrese a ver se encuentre en estado "2" (activo).
     * Caso contrario responde con http 403
     *
     * @param User|null $user
     * @param PostModel $post
     * @return Response
     */
    public function published(?UserEloquentModel $user, PostEloquentModel $post): Response
    {
        return $post->status === '2' ?
            Response::allow() :
            Response::deny('Publicación no disponible');
    }
}
