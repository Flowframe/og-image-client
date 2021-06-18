<?php

namespace Flowframe\OgImageClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Flowframe\OgImageClient\OgImageClient
 *
 * @method static string create(array $payload)
 * @method static array decodePayload(array $payload)
 */
class OgImageClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Flowframe\OgImageClient\OgImageClient::class;
    }
}
