# login

[![Latest Version on Packagist](https://img.shields.io/packagist/v/red-jasmine/login.svg?style=flat-square)](https://packagist.org/packages/red-jasmine/login)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/red-jasmine/login/run-tests?label=tests)](https://github.com/red-jasmine/login/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/red-jasmine/login/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/red-jasmine/login/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/red-jasmine/login.svg?style=flat-square)](https://packagist.org/packages/red-jasmine/login)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require red-jasmine/login
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="red-jasmine-login-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="red-jasmine-login-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="red-jasmine-login-views"
```

## Usage

```php
$login = new RedJasmine\Login();
echo $login->echoPhrase('Hello, RedJasmine!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [liushoukun](https://github.com/liushoukun)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
