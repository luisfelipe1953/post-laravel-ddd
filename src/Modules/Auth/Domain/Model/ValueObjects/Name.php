<?php

declare(strict_types=1);

namespace Src\Modules\Auth\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;
use Src\Common\Domain\Exceptions\RequiredException;


final class Name extends ValueObject
{
    private string $name;

    public function __construct(?string $name)
    {

        if (!$name) {
            throw new RequiredException('nombre');
        }

        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): string
    {
        return $this->name;
    }
}