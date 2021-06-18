<?php

use Flowframe\OgImageClient\Facades\OgImageClient;

if (! function_exists('og')) {
    function og(array $payload): string
    {
        return OgImageClient::create($payload);
    }
}

// Just because it's cool
if (! function_exists('📸')) {
    function 📸(array $payload): string
    {
        return OgImageClient::create($payload);
    }
}
