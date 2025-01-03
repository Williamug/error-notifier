# Error Notifier

[![Latest Version on Packagist](https://img.shields.io/packagist/v/williamug/error-notifier.svg?style=flat-square)](https://packagist.org/packages/williamug/error-notifier)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/williamug/error-notifier/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/williamug/error-notifier/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/williamug/error-notifier/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/williamug/error-notifier/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/williamug/error-notifier.svg?style=flat-square)](https://packagist.org/packages/williamug/error-notifier)

A laravel package to notify a developer about the errors in the application immediately by sending an email or a slack message.

## Installation

You can install the package via composer:

```bash
composer require williamug/error-notifier
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="error-notifier-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="error-notifier-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="error-notifier-views"
```

## Usage

```php
$errorNotifier = new Williamug\ErrorNotifier();
echo $errorNotifier->echoPhrase('Hello, Williamug!');
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

- [Asaba William](https://github.com/williamug)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
