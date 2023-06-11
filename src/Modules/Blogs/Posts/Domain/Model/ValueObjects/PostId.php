<?php

namespace Src\Modules\Blogs\Posts\Domain\Model\ValueObjects;

class PostId
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function value()
    {
        return $this->id;
    }
}
