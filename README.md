# Blade Car Makes Icons

<a href="https://github.com/johan-boshoff/blade-car-makes-icons/actions?query=workflow%3ATests">
    <img src="https://github.com/johan-boshoff/blade-car-makes-icons/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://packagist.org/packages/johan-boshoff/blade-car-makes-icons">
    <img src="https://img.shields.io/packagist/v/johan-boshoff/blade-car-makes-icons" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/johan-boshoff/blade-car-makes-icons">
    <img src="https://img.shields.io/packagist/dt/johan-boshoff/blade-car-makes-icons" alt="Total Downloads">
</a>

A package to easily make use of [car-makes-icons](https://github.com/dangnelson/car-makes-icons) SVG icons in your Laravel Blade views.

The original [car-makes-icons](https://github.com/dangnelson/car-makes-icons) is a set of icons consisting logos of car makes to match the Edmunds API. The icons are designed and maintained by [Dan G Nelson](https://github.com/dangnelson).

For a full list of available icons see [the SVG directory](resources/svg) or preview them on the [car-makes-icons README](https://github.com/dangnelson/car-makes-icons/blob/master/README.md) or on [Iconduck](https://iconduck.com/sets/car-company-logos).

## Requirements

- PHP 8.0 or higher
- Laravel 9.0 or higher

## Installation

```bash
composer require johan-boshoff/blade-car-makes-icons
```

## Updating

Please refer to [`the upgrade guide`](https://github.com/blade-ui-kit/blade-icons/blob/1.x/UPGRADE.md) when updating the library.

## Blade Icons

Blade Car Makes Icons uses Blade Icons under the hood. Please refer to [the Blade Icons readme](https://github.com/blade-ui-kit/blade-icons) for additional functionality. We also recommend to [enable icon caching](https://github.com/blade-ui-kit/blade-icons#caching) with this library.

## Configuration

Blade Car Makes Icons also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `blade-car-makes-icons.php` config file:

```bash
php artisan vendor:publish --tag=blade-car-makes-icons-config
```

## Usage

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-carmakes-acura/>
```

You can also pass classes to your icon components:

```blade
<x-carmakes-acura class="w-6 h-6 text-gray-500"/>
```

And even use inline styles:

```blade
<x-carmakes-acura style="color: #555"/>
```

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-car-makes-icons --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-car-makes-icons/acura.svg') }}" width="10" height="10"/>
```

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade Car Makes Icons is developed and maintained by Johan Boshoff.

## License

Blade Car Makes Icons is open-sourced software licensed under [the MIT license](LICENSE.md).
