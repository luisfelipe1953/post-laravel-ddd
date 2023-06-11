<?php

namespace Src\Modules\Blogs\Posts\Domain\Model;

use Src\Modules\Blogs\Tags\Domain\Model\ValueObjects\{
    TagColor,
    TagName,
    TagSlug,
};

class Tag
{
    public function __construct(
        public readonly ?int $id,
        public readonly TagName $name,
        public readonly TagSlug $slug,
        public readonly TagColor $color,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'slug' => $this->color,
        ];
    }
}
