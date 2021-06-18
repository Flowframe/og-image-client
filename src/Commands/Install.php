<?php

namespace Flowframe\OgImageClient\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    public $signature = 'og-image-client:install';

    public $description = 'Install og image client';

    public function handle(): void
    {
        $this->call('vendor:publish', ['--tag' => 'og-image-client-config']);
    }
}
