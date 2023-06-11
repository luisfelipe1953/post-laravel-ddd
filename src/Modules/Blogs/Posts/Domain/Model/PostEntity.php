<?php

namespace Src\Modules\Blogs\Posts\Domain\Model;

use Src\Modules\Blogs\Posts\Domain\Model\ValueObjects\{
    PostId,
    PostTitle,
    PostExtract,
    PostBody,
    PostStatus
};



class PostEntity
{
    private $id;
    private ?string $title;
    private ?string $extract;
    private ?string $body;
    private ?int $status;

    public function __construct(
        ?PostId $id,
        ?PostTitle $title,
        ?PostExtract $extract,
        ?PostBody $body,
        ?PostStatus $status
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->extract = $extract;
        $this->body = $body;
        $this->status = $status;
    }

    public function status()
    {
        return $this->status;
    }
}
