<?php

namespace Src\Modules\Blogs\Tags\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class TagName
{
    private ?string $name;

    public function __construct(?string $name)
    {
        if (!$name) {
            throw new RequiredException('name');
        }

        $this->name = $name;
    }

    public function value(): string
    {
        return $this->name;
    }
}
