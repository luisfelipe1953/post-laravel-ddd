<?php

namespace Src\Modules\Blogs\Profiles\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProfileModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

class ProfileEloquentModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * Relacion Uno a Uno to User::class
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(UserEloquentModel::class);
    }

    protected static function newFactory()
    {
        return ProfileModelFactory::new();
    }
}
