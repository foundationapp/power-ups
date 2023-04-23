# 🌟 Power-Ups

Power-Ups allow developers to create re-usable [TALL Stack](https://tallstack.dev) components for [Laravel](https://laravel.com) applications.

![Power-Ups Image](/assets/img/power-ups-image.jpg)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/foundationapp/power-ups.svg?style=flat-square)](https://packagist.org/packages/foundationapp/power-ups)
[![Total Downloads](https://img.shields.io/packagist/dt/foundationapp/power-ups.svg?style=flat-square)](https://packagist.org/packages/foundationapp/power-ups)

Similar to how 🍄 **Power-Ups** help Mario complete a level, this package helps developers save time by providing a clear list of available [Tall Stack Components](https://laravel-livewire.com/docs/2.x/rendering-components) to choose from. Now, developers can build 🍄 Power-ups and easily re-use them in any another application.


## Installation

You can install the package via composer:

```bash
composer require foundationapp/power-ups
```

After including the package, you can install any a **Power-Up** by running:

```bash
php artisan powerup:install name-of-component
```

If we wanted to install the [https://github.com/foundationapp/hello-world](https://github.com/foundationapp/hello-world)] example, we would run: 

```bash
php artisan powerup:install foundationapp/hello-world
```

> You can install any power-up by passing the `vendor/repo` to the install command.

## Usage

After installing a power-up, you can enable it with:

```bash
php artisan powerup:enable name-of-component
```

and use it on any page:

```
<livewire:powerup.name-of-component />
```

You can see a list out all the installed **Power-Ups** by running the following command:

```bash
php artisan powerup:list
```

If you wish to disable or remove the Power-up, you may run the following commands accordingly:

```
php artisan powerup:disable name-of-component
php artisan powerup:remove name-of-component
```

## Available Power-Ups

Here are a list of a some available Power-Ups you can use, or you can create your own.

- 👋 [Hello World](https://github.com/foundationapp/hello-world)  - Example power-up for learning purposes
- 📸 [Media Selector](https://github.com/foundationapp/media-selector) - Add an Emoji, Icon, or Image using the MediaSelector

## Create Your Own Power-Ups

If you wish to create your own Power-Up, you can easily copy the HelloWorld example and create your own. This will allow you to convert any existing Livewire component and turn it into your own **Power-Up** that can be used across all your apps.

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
