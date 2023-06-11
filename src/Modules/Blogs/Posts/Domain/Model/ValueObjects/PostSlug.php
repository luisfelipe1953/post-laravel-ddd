<?php

namespace Src\Modules\Blogs\Posts\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class PostSlug
{
    private ?string $slug;

    public function __construct(?string $slug)
    {
        if (!$slug) {
            throw new RequiredException('slug');
        }

        $this->slug = $slug;
    }

    public function value()
    {
        return $this->slug;
    }
}
