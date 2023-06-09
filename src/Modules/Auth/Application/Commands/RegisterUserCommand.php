<?php

namespace Src\Modules\Auth\Application\Commands;

use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Domain\Model\User;

class RegisterUserCommand
{
    /**
     * Inicializa la comunicacion
     *
     * @param IRegisterRepository $repository
     */
    public function __construct(private readonly IRegisterRepository $repository) { }

    /**
     * Comunica que hay que registrar un usuario
     *
     * @param array $data
     * @return void
     */
    public function registerAndNotify(User $user): void
    {
        $this->repository->registerAUser($user);
    }
}
