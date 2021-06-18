<?php

namespace Flowframe\OgImageClient\Tests;

use Flowframe\OgImageClient\OgImageClientServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

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
