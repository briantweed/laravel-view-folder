# Laravel View Folder

Create view folder structure with sub folders for partials, components and modals as well as basic CRUD files.
  
## Basic Usage

Use the command: 
``` php
php artisan make:view
```
<br>

You will then be promted with a series of questions:
``` text
What is the folder path (use can use forward slashes or dots) ? (pages/admin/users or pages.admin.users)
Would you like a sub-folder for partials? (y/n)
Would you like a sub-folder for components? (y/n)
Would you like a sub-folder for modals? (y/n)
Would you like to add CRUD files? (y/n) (creates index, create, edit and delete files)
```
<br/>

**Additional Options**

You can specify the folder structure with the command: 

``` php
php artisan make:view pages.admin.users
```

There are also options for each of the additional questions:    

``` text
--p : add partials subfolder
--c : add components subfolder
--m : add modals subfolder
--f : add CRUD files
```
<br/>

No questions will be asked if one or more of these are included in the command

``` php
php artisan make:view pages.admin.test --p --f
```

This will create a pages/admin/test tree folder structure with a partials subfolder and the CRUD files 

<br>

  
## Installation

Via Composer

``` bash
$ composer require --dev briantweed/laravelviewfolder
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
