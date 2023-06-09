<?php

declare(strict_types=1);

namespace Src\Auth\Register\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;
use Src\Common\Domain\Exceptions\RequiredException;
use Src\Common\Domain\Exceptions\IncorrectEmailFormatException;



final class Email extends ValueObject
{
    private string $email;

    public function __construct(?string $email, $isOptional = false)
    {
        if (!$email && !$isOptional) {
            throw new RequiredException('email');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new IncorrectEmailFormatException();
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }

    public function jsonSerialize(): string
    {
        return $this->email;
    }
}