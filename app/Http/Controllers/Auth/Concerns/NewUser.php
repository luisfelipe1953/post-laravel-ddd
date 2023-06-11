<?php

namespace App\Http\Controllers\Auth\Concerns;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisterRequest;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

trait NewUser
{
    /**
     * Crear un usuario en la base de datos
     *
     * @param RegisterRequest $request
     */
    public function createAndNotify(RegisterRequest $request): UserEloquentModel
    {
        $user = UserEloquentModel::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return $user;
    }
}
