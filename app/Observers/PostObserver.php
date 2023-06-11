<?php

namespace App\Observers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent\PostEloquentModel;


class PostObserver
{
    // /**
    //  * Antes de crear un Post verifica que el autor del post sea igual al usuario autenticado
    //  *
    //  * @param PostModel $post
    //  * @return void
    //  */
    // public function creating(PostEloquentModel $post): void
    // {
    //     if (!App::runningInConsole()) {
    //         $post->user_id = auth()->user()->id;
    //     }
    // }

    // /**
    //  * Antes de eliminar un post, también elimina la imagen vinculada
    //  *
    //  * @param PostModel $post
    //  * @return void
    //  */
    // public function deleting(PostEloquentModel $post): void
    // {
    //     if ($post->image) {
    //         Storage::delete($post->image->url);
    //     }
    // }
}
