<?php

namespace Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\PostModelFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;
use Src\Modules\Blogs\Images\Infrastructure\Persistence\ImageEloquentModel;
use Src\Modules\Blogs\Comments\Infrastructure\Persistence\CommentEloquentModel;
use Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent\TagEloquentModel;
use Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent\CategoryEloquentModel;

class PostEloquentModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Asignacion masiva
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserEloquentModel::class);
    }

    /**
     * Relacion Uno a Muchos Inversa to CategoryModel::class
     *
     * @return BelongsTo
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(CategoryEloquentModel::class, 'category_id');
    }

    /**
     * Relacion Uno a Uno Polimorfica to ImageModel::class
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(ImageEloquentModel::class, 'imageable');
    }

    /**
     * Relacion Uno a Muchos Polimorfica to CommentModel::class
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(CommentEloquentModel::class, 'commentable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica to TagModel::class
     *
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(TagEloquentModel::class, 'taggable', 'taggables', 'taggable_id', 'tag_id');
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return PostModelFactory::new();
    }
}
