<?php

namespace Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent;

use Database\Factories\TagModelFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Videos\Infrastructure\Eloquent\VideoModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Src\Modules\Blogs\Videos\Infrastructure\Persistence\VideoEloquentModel;
use Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent\PostEloquentModel;

class TagEloquentModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Agregacion masiva
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to PostModel::class
     *
     * @return MorphToMany
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(PostEloquentModel::class, 'taggable', null, 'tag_id');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to VideoModel::class
     *
     * @return MorphToMany
     */
    public function videos(): MorphToMany
    {
        return $this->morphedByMany(VideoEloquentModel::class, 'taggable');
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TagModelFactory::new();
    }
}
