<?php

use Flowframe\OgImageClient\OgImageClient;

if (! function_exists('og')) {
    function og(): OgImageClient
    {
        return app(OgImageClient::class);
    }
}

// Just because it's cool
if (! function_exists('📸')) {
    function 📸(array $payload): string
    {
        return og()->generate($payload);
    }
}
