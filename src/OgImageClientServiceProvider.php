<?php

namespace Flowframe\OgImageClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OgImageClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('og-image-client')
            ->hasConfigFile('og-image-client')
            ->hasCommand(Commands\Install::class)
            ->hasRoute('web');
    }
}
