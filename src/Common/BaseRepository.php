<?php

namespace Src\Common;

use Src\Common\Traits\{
    Hasher,
    Logger,
    Converter,
    ConsumeExternalService,
    ApiResponser
};

abstract class BaseRepository
{
    use Hasher, Converter, Logger, ConsumeExternalService, ApiResponser;
}
