<?php

namespace briantweed\LaravelViewFolder;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;


class LaravelViewFolderServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->commands([
            Commands\ViewFolderCommand::class
        ]);
    }


    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Commands/stubs' => resource_path('stubs'),
        ]);
    }


    public function provides()
    {
        return [
            Commands\ViewFolderCommand::class
        ];
    }

}
