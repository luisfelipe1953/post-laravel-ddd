<?php

namespace Src\Modules\Blogs\Categories\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class CategorySlug
{
    private string $slug;

    public function __construct(?string $slug)
    {

        if (!$slug) {
            throw new RequiredException('slug');
        }

        $this->slug = $slug;
    }

    /**
     * Retorna el slug category
     *
     * @return string
     */
    public function value(): string
    {
        return $this->slug;
    }
}
