<?php

namespace briantweed\LaravelViewFolder\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;

class ViewFolderCommand extends GeneratorCommand
{

    protected $signature = 'make:view {path?} {{--p : Add partials sub-folder}}  {{--m : Add modals sub-folder}}  {{--c : Add components sub-folder}} {{--f : Add CRUD files}}';
    protected $description = 'Create view folder';
    protected $type = 'Console command';

    protected $additionalFiles;
    protected $optionGiven = false;
    protected $basePath;
    protected $currentFolder;

    protected const RESOURCE_PATH = './resources/views/';

    protected const FOLDER_PATH_QUESTION = 'What is the folder path (use can use forward slashes or dots) ?';
    protected const SUBFOLDER_QUESTION = 'Would you like a sub-folder for ';
    protected const CRUD_QUESTION = 'Would you like to add CRUD files?';

    protected const PARTIALS_FOLDER = 'partials';
    protected const MODALS_FOLDER = 'modals';
    protected const COMPONENTS_FOLDER = 'components';

    protected const OPTIONS_ARRAY = ['p','c','m','f'];

    protected const CRUD_FILES = [
        'index',
        'create',
        'edit',
        'delete'
    ];

    protected const SUCCESS_MESSAGE = 'View folder created';
    protected const ALREADY_EXISTS_MESSAGE = 'Folder already exists';



    public function handle()
    {
        $this->basePath = $this->argument('path') ?? $this->ask(self::FOLDER_PATH_QUESTION);

        $this->setBasePath();

        if(!$this->files->isDirectory($this->basePath)) {

            $this->files->makeDirectory($this->basePath, 0755, true);

            $askQuestions = !$this->additionalOptionsGiven();

            if ($this->option('p') || ($askQuestions && $this->confirm(self::SUBFOLDER_QUESTION . self::PARTIALS_FOLDER . '?'))) {
                $this->createDirectory(self::PARTIALS_FOLDER);
            }

            if ($this->option('m') || ($askQuestions && $this->confirm(self::SUBFOLDER_QUESTION . self::MODALS_FOLDER . '?'))) {
                $this->createDirectory(self::MODALS_FOLDER);
            }

            if ($this->option('c') || ($askQuestions && $this->confirm(self::SUBFOLDER_QUESTION . self::COMPONENTS_FOLDER . '?'))) {
                $this->createDirectory(self::COMPONENTS_FOLDER);
            }

            $this->setCurrentFolder();

            if ($this->option('f') || ($askQuestions && $this->confirm(self::CRUD_QUESTION))) {
                $this->createCrudFiles();
            }

            $additionalFiles = $this->ask('Create additional files (comma separated) ?', false);
            if($additionalFiles) {
                $this->createAdditionalFiles($additionalFiles);
            }
            $this->info(self::SUCCESS_MESSAGE);

        }
        else {
            $this->error(self::ALREADY_EXISTS_MESSAGE);
        }

    }


    protected function createDirectory($folder)
    {
        $this->setCurrentFolder($folder);

        $this->files->makeDirectory($this->basePath . '/' . $this->currentFolder . '/');

        $additionalFiles = $this->ask('Create files for ' . strtolower($folder) . ' folder (comma separated) ?', false);

        if($additionalFiles) {
            $this->createAdditionalFiles($additionalFiles);
        }
    }


    protected function getStub(): string
    {
        return __DIR__.'/stubs/view.stub';
    }


    private function setBasePath()
    {
        $this->basePath = self::RESOURCE_PATH . $this->formatPath();
    }


    private function setCurrentFolder($folder = '')
    {
        $this->currentFolder = $folder ? $folder . '/' : '';
    }


    private function formatPath(): string
    {
        return $this->format($this->basePath);
    }


    private function format(string $string): string
    {
        return str_replace('.', '/', $string);
    }


    private function createCrudFiles()
    {
        foreach(self::CRUD_FILES as $file) {
            $this->createFile($file);
        }
    }


    private function createAdditionalFiles(string $string)
    {
        $files = $this->getFiles($string);
        foreach($files as $file) {
            $this->createFile($file);
        }
    }


    private function getFiles(string$string): array
    {
        return explode(',', $string);
    }


    private function createFile(string $file)
    {
        File::put($this->basePath . '/' . $this->currentFolder . $file . '.blade.php', $this->files->get($this->getStub()));
    }


    private function additionalOptionsGiven(): bool
    {
        return in_array(self::OPTIONS_ARRAY, $this->options());
    }

}

