# RestSocialLogin Larave-Module

A Laravel module for developers to implement easily a social login in their Rest-APIs using both [**laravel/socialite**](https://github.com/laravel/socialite) and [**tymondesigns/jwt-authpackages**](https://github.com/tymondesigns/jwt-auth).

## Quick start

* This module also includes the User model and its migration.

1º Use `composer create-project coduxe/modular-laravel yourprojectname` to create a new modular laravel based project using [**coduxe/modular-laravel**](https://github.com/coduxe/modular-laravel)

2º Download/Clone this module, on the `modules` folder of your laravel project

3º We recomend you to make sure the module is correctly installed by the comand:
>
```bash
$ php artisan module:list
```
Shall appear the RestSocialLogin module as "enabled".
Also run this command to make sure that the module routes are available:
>
```bash
$ php artisan route:list
```

## Options

Set the social providers on the services config file at `config/services.php`.

Providers are called using the route param "provider". For example:

>
```js
http://myapproute/auth?provider=normal
// or
http://myapproute/auth?provider=facebook
// or
http://myapproute/auth?provider=google
```

## Tests
For running the RestSocialLogin module tests, use the command:
>
```bash
$ cd your-laravel-project-folder
$ php artisan module:publish-migration sociallogin
$ ./vendor/bin/phpunit --configuration ./modules/RestSocialLogin/phpunit.xml  --testsuite sociallogin
```

## Authors
- [**Coduxe/github**](https://github.com/coduxe)
- [**Coduxe/web**](http://coduxe.com)
