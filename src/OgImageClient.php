<?php

namespace Flowframe\OgImageClient;

class OgImageClient
{
    public function create(array $payload): string
    {
        throw_unless($payload['template'], 'A template is required.');

        throw_unless(config('og-image-client.url'), '`url` missing in og-image-client configuration.');

        throw_unless(config('og-image-client.secret_token'), '`secret_token` missing in og-image-client configuration.');

        throw_unless(isset($payload['template']), 'A template is required in your payload.');

        $payload['url'] = isset($payload['url']) ? $payload['url'] : url('_og-image');

        return $this->createUrl($payload);
    }

    private function encodePayload(array $payload): string
    {
        return urlencode(json_encode($payload));
    }

    public function decodePayload(string $payload): array
    {
        return json_decode(urldecode($payload), true);
    }

    private function createUrl(array $payload): string
    {
        $encodedPayload = $this->encodePayload($payload);
        $signature = $this->signPayload($payload);
        $url = config('og-image-client.url');

        return "{$url}?payload={$encodedPayload}&signature={$signature}";
    }

    private function signPayload(array $payload): string
    {
        return hash_hmac('sha256', json_encode($payload), config('og-image-client.secret_token'));
    }

    public function verifySignature(array $payload, string $signature): bool
    {
        return $this->signPayload($payload) === $signature;
    }
}
