# Laravel Task Manager
This is a laravel package that adds task management functionality to web applications.

It supports Laravel 5.0 and later

## Installation

[PHP](https://php.net) 5.4+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel Taskmanager, simply add the following line to the require block of your `composer.json` file.

```
"dinyangetoh/simple-taskmanager": "dev-master"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

If you are using Laravel 5.5 or later, the service provider auto discovery feature will load the required classes after installation otherwise, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `Dinyangetoh\SimpleTaskmanager\TaskManagerServiceProvider::class`

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'Simpletaskmanager' => Dinyangetoh\SimpleTaskmanager\Facades\TaskManager::class,
    ...
]
```

## Configuration

You need to run migrations to create necessary tables

```bash
php artisan migrate"
```

You can publish the configuration file using this command:

```bash
php artisan vendor:publish --tag=public
```

Then you are ready to get runnings. Just visit 

```bash
http://{{site-url}}/tasks
```

Add task categories and tasks. Enjoy.

Developed with love from 

David Inyangetoh
@dinyangetoh

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.