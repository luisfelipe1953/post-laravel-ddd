<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

class UserUpdateController extends Controller
{
    /**
     * Guarda los roles designados al usuario registrado.
     * Redirecciona a la ruta designada.
     *
     * @param Request $request
     * @param UserEloquentModel $user
     * @return Redirector|RedirectResponse
     */
    public function update(Request $request, UserEloquentModel $user): Redirector|RedirectResponse
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.user.index')->with('update', 'Se ha actualizado el rol correctamente');
    }
}
