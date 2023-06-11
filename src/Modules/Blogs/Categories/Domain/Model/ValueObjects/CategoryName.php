<?php

namespace Src\Modules\Blogs\Categories\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class CategoryName
{
    private string $name;

    public function __construct(?string $name)
    {

        if (!$name) {
            throw new RequiredException('name');
        }

        $this->name = $name;
    }

    /**
     * Retorna el name category
     *
     * @return string
     */
    public function value(): string
    {
        return $this->name;
    }
}
