# Laravel View Folder

<p>Command to create a view folder structure with sub folders for partials, components and modals.</p>
<p>Option to add basic CRUD files to the parent folder (create, edit, update, delete) and additional files to each folder.</p>
<br>



## Installation

<p>Via Composer</p>

``` bash
$ composer require --dev briantweed/laravel-view-folder
```
<br>

<p>You then need to publish the template files. Run the command: </p>

``` php
php artisan vendor:publish
```

<p>Then type in the number that matches against this package. The files will be published to a stubs folder in the resources directory.</p>
<br>


## Basic Usage

<p>Use the command:</p>
 
``` php
php artisan make:view
```
<br>


<p>You will then be asked a series of questions:</p>

``` text
What is the folder path (use can use forward slashes or dots)?
Would you like a sub-folder for partials? (yes/no)
Would you like a sub-folder for components? (yes/no)
Would you like a sub-folder for modals? (yes/no)
Would you like to add CRUD files? (yes/no)
```
<br>


<p>If you answer yes to a question you are then asked if you want to add files to the folder.<br>   
Either leave blank or enter a comma delimited string for all the files you want to create.<br>
</p>
<br>


**Additional Options**

<p>You can specify the folder structure with the command:</p>

``` php
php artisan make:view pages.admin.users
```
or
``` php
php artisan make:view pages/admin/users
```
<br>


<p>You can specify which sub folders you would like to include be adding one or more of the following options:</p>

``` text
--p : add partials subfolder
--c : add components subfolder
--m : add modals subfolder
--f : add CRUD files
```
<br>


**Example**

``` php
php artisan make:view pages.admin.test --p --f
```

<p>This will create a pages/admin/test folder structure with a partials subfolder and the CRUD files.</p>  
<br>




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
