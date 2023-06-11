<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UserInfoRequest;
use App\Http\Controllers\User\Contracts\IUserInfo;
use App\Http\Controllers\User\Concerns\UserAdapter;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

class UserInfoController extends Controller implements IUserInfo
{
    use UserAdapter;

    /**
     * Retorna la vista y parámetros
     *
     * @param UserEloquentModel $user
     * @return View
     */
    public function profile(UserEloquentModel $user): View
    {
        return view('user.profile', compact('user'));
    }

    /**
     * Actualiza la información del usuario autenticado
     *
     * @param UserInfoRequest $request
     * @return RedirectResponse
     */
    public function update(UserInfoRequest $request): RedirectResponse
    {
        $this->updateInfoUser($request);
        return back()->with('status', 'Datos actualizados correctamente');
    }
}
