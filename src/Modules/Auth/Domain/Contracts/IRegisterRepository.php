<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Infrastructure\Http\Request\RegisterRequest;

interface IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param array $data
     * @return void
     */
    public function registerAUser(array $data): void;
}
