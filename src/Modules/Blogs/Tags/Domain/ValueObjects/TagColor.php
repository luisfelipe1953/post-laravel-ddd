<?php

namespace Src\Modules\Blogs\Tags\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class TagColor
{
    private ?string $color;

    public function __construct(?string $color)
    {
        if (!$color) {
            throw new RequiredException('color');
        }

        $this->color = $color;
    }

    public function value(): string
    {
        return $this->color;
    }
}
