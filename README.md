# Statamic Images Missing Alt

> This is an addon to list all images with no alt text on your Statamic dashboard.

## Features

This addon adds a widget which you can add to your dashboard. If there are images which do not have an alt text they will be listed in that widget.

Having alt text on every asset improves accessibility as well as search engine optimization.

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic dashboard and click **install**, or run the following command from your project root:

``` bash
composer require teamnovu/statamic-images-missing-alt
```

## How to Use

Just add the widget to your `config/statamic/cp.php` as you would [any other widget](https://statamic.dev/widgets#configuration).

The following is an example which shows all the possible config values you can use.

```php
[
    'type' => 'images_missing_alt', // Required
    'container' => 'assets', // Default: "assets" – The container to search through.
    'limit' => 5, // Default: 5 – The number of images to display in the widget.
    'expiry' => 30, // Default: 0 – The number of seconds to cache the list of images with no alt text for.
    'width' => 50, // Default: 100 – The size of the widget.
],
```

## Credit

This widget has basically been extracted from the [Statamic Peak starter kit](https://github.com/studio1902/statamic-peak).

A more serious solution to having alt texts on every asset is tracked and discussed in [this issue](https://github.com/statamic/ideas/issues/496).
