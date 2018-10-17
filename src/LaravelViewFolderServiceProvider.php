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
        Artisan::call('vendor:publish',['--provider' => 'briantweed/laravel-view-folder']);
    }


    public function provides()
    {
        return [
            Commands\ViewFolderCommand::class
        ];
    }

}
