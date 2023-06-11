<?php

namespace Src\Modules\Blogs\Categories\Domain\Model;

use Src\Modules\Blogs\Categories\Domain\Model\ValueObjects\CategoryName;
use Src\Modules\Blogs\Categories\Domain\Model\ValueObjects\CategorySlug;

class Category
{
    public function __construct(
        public readonly ?int $id,
        public readonly CategoryName $name,
        public readonly CategorySlug $slug,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
