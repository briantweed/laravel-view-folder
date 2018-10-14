<?php

namespace briantweed\LaravelViewFolder\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;


class ViewFolderCommand extends GeneratorCommand
{

    protected $signature = 'make:view {path?}';

    protected $description = 'Create view folder';

    protected $type = 'Console command';

    protected $resourcePath = './resources/views/pages/';

    protected $optionGiven = false;

    protected $path;


    public function handle()
    {
        $this->path = $this->argument('path') ??
            $this->ask('What is the folder path (use can use forward slashes or dots) ?');

        $this->generateFullPath();

        if(!$this->files->isDirectory($this->path)) {

            $this->files->makeDirectory($this->path);
            $this->files->makeDirectory($this->path . '/partials/');
            $this->files->makeDirectory($this->path . '/modals/');
            $this->files->makeDirectory($this->path . '/components/');

            $stub = $this->getStub();
            File::put($this->path.'/index.blade.php', $this->files->get($stub));
            File::put($this->path.'/create.blade.php', $this->files->get($stub));
            File::put($this->path.'/edit.blade.php', $this->files->get($stub));
            File::put($this->path.'/delete.blade.php', $this->files->get($stub));

            $this->info('View folder created');

        }
        else {
            $this->error('Folder already exists');
        }

    }


    protected function getStub()
    {
        return __DIR__.'/stubs/view.stub';
    }


    private function generateFullPath()
    {
        $this->path = $this->resourcePath . $this->formatPath();
    }


    private function formatPath()
    {
        return str_replace('.', '/', $this->path);
    }

}
