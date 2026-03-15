# A Laravel mailer driver for sending transactional emails through Scaleway TEM.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/moxso/laravel-scaleway-tem.svg?style=flat-square)](https://packagist.org/packages/moxso/laravel-scaleway-tem)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/moxso/laravel-scaleway-tem/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/moxso/laravel-scaleway-tem/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/moxso/laravel-scaleway-tem.svg?style=flat-square)](https://packagist.org/packages/moxso/laravel-scaleway-tem)

Laravel Scaleway TEM Mailer provides a seamless mail transport integration for sending transactional emails through Scaleway Transactional Email (TEM) directly from Laravel applications.

The package adds a dedicated mail driver that allows Laravel's Mail system to deliver messages via the Scaleway TEM API while preserving the familiar Laravel mail workflow.

This package uses the Scaleway API transport only. It does not configure or send mail over SMTP.

## Installation

You can install the package via composer:

```bash
composer require moxso/laravel-scaleway-tem
```

Publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-scaleway-tem-config"
```

This is the contents of the published config file:

```php
return [
    'project_id' => env('SCALEWAY_TEM_PROJECT_ID'),
    'api_key' => env('SCALEWAY_TEM_API_KEY'),
    'region' => env('SCALEWAY_TEM_REGION', 'fr-par'),
];  
```

Finally, add the mailer to your `config/mail.php` configuration file:

```php
'scaleway' => [
    'transport' => 'scaleway',
]
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Moxso](https://github.com/Moxso)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
