<?php

namespace Flowframe\OgImageClient\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Flowframe\OgImageClient\OgImageClientServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            OgImageClientServiceProvider::class,
        ];
    }
}
