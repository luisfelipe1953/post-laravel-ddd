<?php

namespace Src\Modules\Auth\Application\Commands;

use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;

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
    public function registerAndNotify(array $data): void
    {
        $this->repository->registerAUser($data);
    }
}
