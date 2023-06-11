<?php

namespace App\Http\Controllers\User\Contracts;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UserInfoRequest;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

interface IUserInfo
{
    /**
     * Retorna la vista y parámetros
     *
     * @param UserEloquentModel $user
     * @return View
     */
    public function profile(UserEloquentModel $user): View;

    /**
     * Actualiza la información del usuario autenticado
     *
     * @param UserInfoRequest $request
     * @return RedirectResponse
     */
    public function update(UserInfoRequest $request): RedirectResponse;
}
