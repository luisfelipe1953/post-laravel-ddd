<?php

namespace Src\Modules\Blogs\Posts\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class PostTitle
{
    private ?string $title;

    public function __construct(?string $title)
    {
        if (!$title) {
            throw new RequiredException('title');
        }

        $this->title = $title;
    }

    public function value(): string
    {
        return $this->title;
    }
}
