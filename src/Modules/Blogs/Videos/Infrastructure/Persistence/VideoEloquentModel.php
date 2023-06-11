<?php

namespace Src\Modules\Blogs\Videos\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;
use Src\Modules\Blogs\Comments\Infrastructure\Persistence\CommentEloquentModel;
use Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent\TagEloquentModel;

class VideoEloquentModel  extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(UserEloquentModel::class);
    }

    /**
     * Relacion Uno a Muchos Polimorfica to CommentModel::class
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany(CommentEloquentModel::class, 'commentable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica to TagModel::class
     *
     * @return void
     */
    public function tags()
    {
        return $this->morphToMany(TagEloquentModel::class, 'taggable');
    }
}
