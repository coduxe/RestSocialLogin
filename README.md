# RestSocialLogin Larave-Module

A Laravel module for developers to implement easily a social login in their Rest-APIs using both [**laravel/socialite**](https://github.com/laravel/socialite) and [**tymondesigns/jwt-authpackages**](https://github.com/tymondesigns/jwt-auth).

## Quick start

1º Install the [**nWidart/laravel-modules**](https://github.com/nWidart/laravel-modules) and
[wikimedia/composer-merge-plugin](https://github.com/wikimedia/composer-merge-plugin) to make your Larvel project modular.
>
```bash
$ composer require nwidart/laravel-modules
$ composer require wikimedia/composer-merge-plugin
```

Also edit your `composer.json` adding:
>
```js
"extra": {
    "merge-plugin": {
        "include": [
            "modules/*/composer.json"
        ]
    }
}
```

2º Config the laravel-modules as necesary
3º Download/Clone this module, on the Modules folder of your laravel project
4º We recomend you to make sure the module is correctly installed by the comand:
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

Shall appear 2 more routes: /auth & /auth/callback

5º Publish the module User migration to your project migrations' folder.
>
```bash
$ php artisan module:publish-migration
```

* This module also includes the User model and its migration.

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
$ ./vendor/bin/phpunit --configuration ./modules/RestSocialLogin/phpunit.xml  --testsuite sociallogin
```

Note: `php artisan module:publish-migration` command shall be done before running tests.

## Authors
- [**Coduxe/github**](https://github.com/coduxe)
- [**Coduxe/web**](http://coduxe.com)
