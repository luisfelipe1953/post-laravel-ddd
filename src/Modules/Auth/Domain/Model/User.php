<?php

declare(strict_types=1);

namespace Src\Modules\Auth\Domain\Model;

use Src\Common\Domain\AggregateRoot;
use Src\Modules\Auth\Domain\Model\ValueObjects\Name;
use Src\Modules\Auth\Domain\Model\ValueObjects\Email;
use Src\Modules\Auth\Domain\Model\ValueObjects\Password;

class User extends AggregateRoot
{
    public function __construct(
        public readonly ?int $id,
        public readonly Name $name,
        public readonly Email $email,
        public readonly Password $password,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
