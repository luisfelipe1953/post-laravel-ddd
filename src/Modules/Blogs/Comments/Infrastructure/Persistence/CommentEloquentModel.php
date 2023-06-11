<?php

namespace Src\Modules\Blogs\Comments\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\CommentModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

class CommentEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'comments';

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(UserEloquentModel::class);
    }

    /**
     * Relacion Uno a Muchos Inversa Polimorfica
     *
     * @return void
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    protected static function newFactory()
    {
        return CommentModelFactory::new();
    }
}
