# Open Graph Image Client for Laravel

This Laravel package allows you to easily create Open Graph images for your application or website. Please go [here](https://github.com/flowframe/og-image-server) if you're looking for the back-end repo.

## Support us

[<img src="https://flowfra.me/github-ad.png" width="419px" />](https://flowfra.me/github-ad-click)

Like our work? You can support us by sponsoring or purchasing one of our products and services.

## Installation

You can install the package via composer:

```bash
composer require flowframe/og-image-client
```

You can easily publish the config like so:

```bash
php artisan og-image-client:install
```

## Usage

Once you have setup up the server you can start using the client side package.

First, setup your `.env`:

```
OG_IMAGE_URL=<your_server_url> // https://your-app-on.vercel.com/api

OG_IMAGE_TEMPLATE_PATH=<your_template_path> // default _og-image, we recommend to keep this

OG_IMAGE_SECRET_TOKEN=<your_secret_token_from_server>
```

_Don't forget to add the /api suffix._

And then generate your image:

```php
// helper function, you can also use the Facade: `OgImageClient::generate(...)`
$image = og()->generate([
    'template' => '_og-images/example', // resources/views/_og-images/example.blade.php

    // Attributes which will be used in the template view
    'title' => 'Hello Flowframe',
    'subtitle' => 'How are you doing?',

    // Array are also supported
    'options' => [
        'Wow',
        'Much',
        'Cool',
    ],
]);
```

When developing locally you can also preview your image by doing:

```php
return og()->preview([
    'template' => '_og-images/example',
    'title' => 'Hello Flowframe',
    'subtitle' => 'How are you doing?',
    'options' => [
        'Wow',
        'Much',
        'Cool',
    ],
]);
```

This will render the template with data.

### Templates

The templates get served from the website itself. Alternatively, you can override the url inside the payload to point to another site.

You're free in where you place the template, we suggest to place it in `resources/views/_og-images`.

Here's an example of a template:

```html
<!-- HTML scaffolding... -->

<body>
    <div>
        <h1>{{ $payload['title] }}</h1>

        <p>{{ $payload['subtitle] }}</p>

        <ul>
            @foreach($payload['options'] as $option)
                <li>{{ $option }}</li>
            @endforeach
        </ul>
    </div>
</body>
```

Be aware that nullable values could raise an error. You can easily avoid it by creating classes which require you to implement certain fields or simple do: `{{ $payload['title] ?? '' }}`.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Lars Klopstra](https://github.com/flowframe)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
