<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Domain\Model\User;

interface IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param array $data
     * @return void
     */
    public function registerAUser(User $user): void;
}
