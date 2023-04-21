# 🌟 Power-ups

Power-ups allow you to create re-usable [TALL Stack](https://tallstack.dev) components for your [Laravel](https://laravel.com) applications.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/foundationapp/power-ups.svg?style=flat-square)](https://packagist.org/packages/foundationapp/power-ups)
[![Total Downloads](https://img.shields.io/packagist/dt/foundationapp/power-ups.svg?style=flat-square)](https://packagist.org/packages/foundationapp/power-ups)
# ![GitHub Actions](https://github.com/foundationapp/power-ups/actions/workflows/main.yml/badge.svg)

This package provides an easy and efficient way to integrate [components](https://laravel-livewire.com/docs/2.x/rendering-components) into any application without the need for manual setup. It simplifies the installation process and helps developers save time by providing a clear list of available components to choose from. With this package, developers can build 🍄 Power-ups and easily re-use them in another [Tall Stack](https://tallstack.dev) application.

## Installation

You can install the package via composer:

```bash
composer require foundationapp/power-ups
```

## Usage

After you include this package, you can see a list out all the available components by running the following command

```bash
php artisan powerup:list
```

To install any of the available components you can run:

```bash
php artisan powerup:install name-of-component
```

Then, you can enable it:

```bash
php artisan powerup:enable name-of-component
``` 

When a component is enabled, you can use it anywhere in your application:

```html
<livewire:powerup.name-of-component />
```

If you wish to disable the componet, you can simply run:

```
php artisan powerup:disable name-of-component
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email tony@devdojo.com instead of using the issue tracker.

## Credits

-   [Tony Lea](https://github.com/foundationapp)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
