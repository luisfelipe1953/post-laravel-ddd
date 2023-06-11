<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

class UserEditController extends Controller
{
    /**
     * Retorna la vista para asignar un rol a un usuario registrado
     *
     * @param UserEloquentModel $user
     * @return View
     */
    public function edit(UserEloquentModel $user): View
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }
}
