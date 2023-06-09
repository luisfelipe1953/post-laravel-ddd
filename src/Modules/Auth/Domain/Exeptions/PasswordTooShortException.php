<?php

namespace Src\Modules\Auth\Domain\Exeptions;

final class PasswordTooShortException extends \DomainException
{
    public function __construct()
    {
        parent::__construct('La contraseña debe tener al menos 8 caracteres');
    }
}