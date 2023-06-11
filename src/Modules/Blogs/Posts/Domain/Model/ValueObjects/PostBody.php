<?php

namespace Src\Modules\Blogs\Posts\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class PostBody
{
    private ?string $body;

    public function __construct(?string $body)
    {
        if (!$body) {
            throw new RequiredException('body');
        }

        $this->body = $body;
    }

    public function value(): string
    {
        return $this->body;
    }
}
