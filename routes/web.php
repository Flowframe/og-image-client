<?php

use Flowframe\OgImageClient\Facades\OgImageClient;
use Illuminate\Support\Facades\Route;

Route::get('_og-image', function () {
    $payload = request()->query('payload');
    $signature = request()->query('signature');

    abort_unless($payload, 400, 'Missing payload.');

    abort_unless($signature, 400, 'Missing signature.');

    $decodedPayload = OgImageClient::decode($payload);
    $signatureIsValid = OgImageClient::verifyIntegrity($payload, $signature);

    abort_unless($signatureIsValid, 400, 'Invalid signature.');

    abort_unless(isset($decodedPayload['template']), 400, 'Missing template in payload.');

    abort_unless(view()->exists($decodedPayload['template']), 400, 'Template does not exist.');

    return view($decodedPayload['template'], [
        'payload' => $decodedPayload,
    ]);
});
