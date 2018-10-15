# Laravel View Folder

Create view folder structure with sub folders for partials, components and modals as well as basic CRUD files.



## Basic Usage

Use the command: 
``` php
php artisan make:view
```

You will then be promted with a series of questions:
1. What is the folder path (use can use forward slashes or dots) ? *e.g. pages/admin/users or pages.admin.users*
2. Would you like a sub-folder for partials? *(y or n)*
3. Would you like a sub-folder for components? *(y or n)*
4. Would you like a sub-folder for modals? *(y or n)*
5. Would you like to add CRUD files? *(y or n) creates index, create, edit and delete files*


**Additional Options**

You can specify the folder structure with the command: 
``` php
php artisan make:view pages.admin.users
```
There are also options for each of the additional questions:    

```
--p : partials
--c : components
--m : modals
--f : CRUD files
```

No questions will be asked if one or more of these are included in the command

e.g.
``` php
php artisan make:view pages.admin.test --p --f
```

This will create a pages/admin/test folder with a partials subfolder and the CRUD files



## Installation

Via Composer

``` bash
$ composer require briantweed/laravelviewfolder
```



## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.




## Credits

- [Brian Tweed][link-author]
- [All Contributors][link-contributors]




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
