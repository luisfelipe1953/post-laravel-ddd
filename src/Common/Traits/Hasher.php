<?php

namespace Src\Common\Traits;

trait Hasher
{
    public function stringHash(string $hash): string
    {
        return password_hash($hash, PASSWORD_BCRYPT);
    }
}
