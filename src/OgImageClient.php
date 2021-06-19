<?php

namespace Flowframe\OgImageClient;

class OgImageClient
{
    public function generate(array $payload): string
    {
        $this->validate($payload);

        $payload['url'] = isset($payload['url']) ? $payload['url'] : url(config('og-image-client.template_path'));

        return $this->buildQuery($payload);
    }

    public function preview(array $payload)
    {
        $this->validate($payload);

        return view($payload['template'], [
            'payload' => $payload,
        ]);
    }

    public function decode(string $payload): array
    {
        return json_decode(base64_decode($payload), true);
    }

    public function verifyIntegrity(string $payload, string $signature): bool
    {
        return $this->sign($payload) === $signature;
    }

    public function validate(array $payload): void
    {
        throw_unless($payload['template'], 'A template is required.');

        throw_unless(config('og-image-client.url'), '`url` missing in og-image-client configuration.');

        throw_unless(config('og-image-client.secret_token'), '`secret_token` missing in og-image-client configuration.');

        throw_unless(isset($payload['template']), 'A template is required in your payload.');

        throw_unless(view()->exists($payload['template']), "View for template `{$payload['template']}` doesn't exist.");
    }

    public function buildQuery(array $payload): string
    {
        $encodedPayload = $this->encode($payload);
        $signature = $this->sign($encodedPayload);
        $url = config('og-image-client.url');

        return "{$url}?payload={$encodedPayload}&signature={$signature}";
    }

    public function sign(string $payload): string
    {
        return hash_hmac('sha256', $payload, config('og-image-client.secret_token'));
    }

    public function encode(array $payload): string
    {
        return base64_encode(json_encode($payload));
    }
}
