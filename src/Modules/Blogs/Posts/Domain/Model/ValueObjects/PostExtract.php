<?php

namespace Src\Modules\Blogs\Posts\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class PostExtract
{
    private ?string $extract;

    public function __construct(?string $extract)
    {
        if (!$extract) {
            throw new RequiredException('extract');
        }

        $this->extract = $extract;
    }

    public function value(): string
    {
        return $this->extract;
    }
}
