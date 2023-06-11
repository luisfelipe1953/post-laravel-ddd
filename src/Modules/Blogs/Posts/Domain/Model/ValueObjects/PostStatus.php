<?php
namespace Src\Modules\Blogs\Posts\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;

class PostStatus
{
    private int $status;

    public function __construct(int $status)
    {
        if (!in_array($status, [1, 2])) {
            throw new RequiredException('slug');
        }

        $this->status = $status;
    }

    public function value(): int
    {
        return $this->status;
    }

    public function actives()
    {
        $actives = $this->status = 2;
        return $actives;
    }
}

   
