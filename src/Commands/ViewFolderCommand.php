<?php

namespace briantweed\LaravelViewFolder\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;

use briantweed\LaravelViewFolder\Interfaces\ViewFolderInterface;


class ViewFolderCommand extends GeneratorCommand implements ViewFolderInterface
{

    protected $signature = 'make:view {path?} {{--p : Add partials sub-folder}}  {{--m : Add modals sub-folder}}  {{--c : Add components sub-folder}} {{--f : Add CRUD files}}';
    protected $description = 'Create view folder';
    protected $type = 'Console command';

    protected $basePath;
    protected $currentFolder;
    protected $stubFile;
    protected $additionalFiles;
    protected $optionGiven = false;


    public function handle()
    {
        $this->basePath = $this->argument('path') ?? $this->ask(self::FOLDER_PATH_QUESTION);

        $this->setBasePath();

        if(!$this->files->isDirectory($this->basePath)) {

            $this->files->makeDirectory($this->basePath, 0755, true);

            $askQuestions = !$this->additionalOptionsGiven();

            if ($this->option('p') || ($askQuestions && $this->confirm(self::SUB_FOLDER_QUESTION . self::PARTIALS_FOLDER . '?'))) {
                $this->stubFile = self::SUB_FOLDER_STUB;
                $this->createDirectory(self::PARTIALS_FOLDER);
            }

            if ($this->option('m') || ($askQuestions && $this->confirm(self::SUB_FOLDER_QUESTION . self::MODALS_FOLDER . '?'))) {
                $this->stubFile = self::SUB_FOLDER_STUB;
                $this->createDirectory(self::MODALS_FOLDER);
            }

            if ($this->option('c') || ($askQuestions && $this->confirm(self::SUB_FOLDER_QUESTION . self::COMPONENTS_FOLDER . '?'))) {
                $this->stubFile = self::SUB_FOLDER_STUB;
                $this->createDirectory(self::COMPONENTS_FOLDER);
            }

            $this->setCurrentFolder();
            $this->stubFile = self::CRUD_FILE_STUB;

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


    protected function createDirectory(string $folder)
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
        return __DIR__.'/stubs/' . $this->stubFile . '.stub';
    }


    private function setBasePath()
    {
        $this->basePath = self::RESOURCE_PATH . $this->formatPath($this->basePath);
    }


    private function setCurrentFolder($folder = '')
    {
        $this->currentFolder = $folder ? $folder . '/' : '';
    }


    private function formatPath(string $string): string
    {
        return str_replace('.', '/', $string);
    }


    private function createCrudFiles()
    {
        foreach(self::CRUD_FILES as $file) {
            $this->createFile($file);
        }
    }


    private function createAdditionalFiles(string $files)
    {
        $filesArray = $this->getFiles($files);
        foreach($filesArray as $file) {
            $this->createFile($file);
        }
    }


    private function getFiles(string $files): array
    {
        return explode(',', $files);
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

