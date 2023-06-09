<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Providers\RouteServiceProvider;
use Src\Modules\Auth\Application\Mapper\UserMapper;
use Src\Modules\Auth\Application\Commands\RegisterUserCommand;
use Src\Modules\Auth\Infrastructure\Http\Request\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Instancia el uso de caso para crear un usuario
     *
     * @param RegisterUserCommand $useCase
     */
    public function __construct(private readonly RegisterUserCommand $useCase) { }

    /**
     * Crea un nuevo usuario dentro de la base de datos
     *
     * @param RegisterRequest $request
     * @param Redirector $redirector
     * @return Redirector|RedirectResponse
     */
    public function __invoke(RegisterRequest $request, Redirector $redirector): Redirector|RedirectResponse
    {
        $data = UserMapper::fromRequest($request);

        $this->useCase->registerAndNotify($data);

        return $redirector->intended(RouteServiceProvider::HOME);
    }
}
