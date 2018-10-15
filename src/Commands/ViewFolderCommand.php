<?php

namespace briantweed\LaravelViewFolder\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;

class ViewFolderCommand extends GeneratorCommand
{

    protected $signature = 'make:view {path?} {{--p : Add partials sub-folder}}  {{--m : Add modals sub-folder}}  {{--c : Add components sub-folder}} {{--f : Add CRUD files}}';

    protected $description = 'Create view folder';

    protected $type = 'Console command';

    protected $resourcePath = './resources/views/';

    protected $optionGiven = false;

    protected $path;


    public function handle()
    {
        $this->path = $this->argument('path') ??
            $this->ask('What is the folder path (use can use forward slashes or dots) ?');

        $this->generateFullPath();

        if(!$this->files->isDirectory($this->path)) {

            $this->files->makeDirectory($this->path, 0755, true);
            
            $askQuestions = !$this->additionalOptionsGiven();

            if ($this->option('p') || ($askQuestions && $this->confirm('Would you like a sub-folder for partials?'))) {
                $this->files->makeDirectory($this->path . '/partials/');
            }

            if ($this->option('m') || ($askQuestions && $this->confirm('Would you like a sub-folder for modals?'))) {
                $this->files->makeDirectory($this->path . '/modals/');
            }

            if ($this->option('c') || ($askQuestions && $this->confirm('Would you like a sub-folder for components?'))) {
                $this->files->makeDirectory($this->path . '/components/');
            }
            
            if ($this->option('f') || ($askQuestions && $this->confirm('Would you like to add CRUD files?'))) {
                $stub = $this->getStub();
                File::put($this->path.'/index.blade.php', $this->files->get($stub));
                File::put($this->path.'/create.blade.php', $this->files->get($stub));
                File::put($this->path.'/edit.blade.php', $this->files->get($stub));
                File::put($this->path.'/delete.blade.php', $this->files->get($stub));
            }

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


    private function additionalOptionsGiven()
    {
        return in_array(['p','c','m','f'], $this->options());
    }

}

