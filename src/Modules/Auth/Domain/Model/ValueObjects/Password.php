<?php

declare(strict_types=1);

namespace Src\Modules\Auth\Domain\Model\ValueObjects;


use Src\Common\Domain\ValueObject;
use Src\Modules\Auth\Domain\Exeptions\PasswordTooShortException;


final class Password extends ValueObject
{
    public ?string $value;

    public function __construct(?string $password)
    {
        if ($password && strlen($password) < 8) {
            throw new PasswordTooShortException();
        }

        $this->value = $password;
    }

    public static function fromString(string $password): self
    {
        return new self($password);
    }

    public function isNotEmpty(): bool
    {
        return $this->value !== null;
    }

    public function jsonSerialize(): string
    {
        return '';
    }
}