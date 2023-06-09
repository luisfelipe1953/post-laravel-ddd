<?php

namespace Src\Common\Traits;

trait Converter
{
    public function lower(string $string): string
    {
        return strtolower($string);
    }

    public function capitalized(string $string): string
    {
        return ucfirst(strtolower($string));
    }
}
