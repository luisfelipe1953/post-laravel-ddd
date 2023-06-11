<?php

namespace Src\Modules\Blogs\Tags\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class TagSlug
{
    private ?string $slug;

    public function __construct(?string $slug)
    {
        if (!$slug) {
            throw new RequiredException('slug');
        }

        $this->slug = $slug;
    }

    public function value(): string
    {
        return $this->slug;
    }
}
