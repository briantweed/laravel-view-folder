# Laravel View Folder

Command to create a view folder structure with sub folders for partials, components and modals.  
Option to add basic CRUD files to the parent folder (create, edit, update, delete) and additional files to each folder.

<br>

## Basic Usage

Use the command: 
``` php
php artisan make:view
```
<br>

You will then be asked a series of questions:
``` text
What is the folder path (use can use forward slashes or dots) ?
Would you like a sub-folder for partials? (y/n)
Would you like a sub-folder for components? (y/n)
Would you like a sub-folder for modals? (y/n)
Would you like to add CRUD files? (y/n)
```
<br/>
If you answer yes to a question you are then asked if you want to add files to the folder.    
Either leave blank or enter a comma delimited string for all the files you want to create.  
Files in the sub pages will be blank. CRUD and parent folder files will have basic blade templating tags.  
  
<br>
  
You can specify the folder structure with the command: 

``` php
php artisan make:view pages.admin.users
```
or
``` php
php artisan make:view pages/admin/users
```

You can specify which sub folders you would like to include be adding one or more of the following options:   

``` text
--p : add partials subfolder
--c : add components subfolder
--m : add modals subfolder
--f : add CRUD files
```
<br/>

**Example**
``` php
php artisan make:view pages.admin.test --p --f
```

This will create a pages/admin/test tree folder structure with a partials subfolder and the CRUD files.  


<br>

  
## Installation

Via Composer

``` bash
$ composer require --dev briantweed/laravel-view-folder
```

<br/>


## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

<br/>

## Credits

- [Brian Tweed][link-author]
- [All Contributors][link-contributors]

<br/>

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/briantweed/laravelviewfolder.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/briantweed/laravelviewfolder.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/briantweed/laravelviewfolder/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/briantweed/laravelviewfolder
[link-downloads]: https://packagist.org/packages/briantweed/laravelviewfolder
[link-travis]: https://travis-ci.org/briantweed/laravelviewfolder
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/briantweed
[link-contributors]: ../../contributors]
