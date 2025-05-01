<?php

namespace App\Providers;

use League\Flysystem\Filesystem as Flysystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Storage::extend('dropbox', function ($app, $config) {
            $client = new DropboxClient($config['authorization_token']);
            $adapter = new DropboxAdapter($client);
            $filesystem = new Flysystem($adapter);

            return new \Illuminate\Filesystem\FilesystemAdapter(
                $filesystem, $adapter, $config
            );
        });
    }
}
