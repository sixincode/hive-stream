<?php

namespace Sixincode\HiveStream\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sixincode\HiveStream\HiveStream
 */
class HiveStream extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sixincode\HiveStream\HiveStream::class;
    }
}
