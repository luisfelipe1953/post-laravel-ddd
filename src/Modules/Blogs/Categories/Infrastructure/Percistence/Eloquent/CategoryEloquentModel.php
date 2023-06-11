<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\CategoryModelFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent\PostEloquentModel;

class CategoryEloquentModel extends Model
{
    use HasFactory;

    /**
     * Tabla del Model
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Almacenamiento masivo
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relacion Uno a Muchos to PostModel::class
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(PostEloquentModel::class);
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CategoryModelFactory::new();
    }
}
