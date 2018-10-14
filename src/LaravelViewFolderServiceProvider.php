<?php

namespace briantweed\LaravelViewFolder;

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

    }


    public function provides()
    {
        return [
            Commands\ViewFolderCommand::class
        ];
    }

}
