<?php

namespace Flowframe\OgImageClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Flowframe\OgImageClient\OgImageClient
 *
 * @method static string generate(array $payload)
 * @method static preview(array $payload)
 * @method static array decode(string $payload)
 * @method static bool verifyIntegrity(string $payload, string $signature)
 * @method static void validate(array $payload)
 * @method static string buildQuery(array $payload)
 * @method static string sign(sign $payload)
 * @method static string encode(array $payload)
 */
class OgImageClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Flowframe\OgImageClient\OgImageClient::class;
    }
}
