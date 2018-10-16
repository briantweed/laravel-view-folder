<?php

namespace briantweed\LaravelViewFolder\Interfaces;

interface ViewFolderInterface
{
    public const RESOURCE_PATH = './resources/views/';

    public const FOLDER_PATH_QUESTION = 'What is the folder path (use can use forward slashes or dots) ?';
    public const SUB_FOLDER_QUESTION = 'Would you like a sub-folder for ';
    public const CRUD_QUESTION = 'Would you like to add CRUD files?';

    public const PARTIALS_FOLDER = 'partials';
    public const MODALS_FOLDER = 'modals';
    public const COMPONENTS_FOLDER = 'components';

    public const CRUD_FILE_STUB = 'crud-page';
    public const SUB_FOLDER_STUB = 'sub-folder-page';

    public const OPTIONS_ARRAY = ['p','c','m','f'];

    public const CRUD_FILES = [
        'index',
        'create',
        'edit',
        'delete'
    ];

    public const SUCCESS_MESSAGE = 'View folder created';
    public const ALREADY_EXISTS_MESSAGE = 'Folder already exists';
    
}