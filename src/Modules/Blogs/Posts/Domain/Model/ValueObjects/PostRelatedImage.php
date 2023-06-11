<?php

namespace Src\Modules\Blogs\Posts\Domain\Model\ValueObjects;

use Illuminate\Support\Facades\Storage;
use Src\Common\Domain\Exceptions\RequiredException;

class PostRelatedImage
{
    protected ?string $image;

    public function __construct(?string $image)
    {
        if (!$image) {
            throw new RequiredException('image');
        }

        $this->image = $image;
    }

    public function value()
    {
        return $this->image;
    }

    public static function deleteProperty($class)
    {
        Storage::delete($class->image->url);
    }
}
