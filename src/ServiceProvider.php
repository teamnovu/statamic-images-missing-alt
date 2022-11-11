<?php

namespace Teamnovu\StatamicImagesMissingAlt;

use Statamic\Events\AssetDeleted;
use Statamic\Events\AssetSaved;
use Statamic\Events\AssetUploaded;
use Statamic\Providers\AddonServiceProvider;
use Teamnovu\StatamicImagesMissingAlt\Listeners\UpdateImagesMissingAltCache;

class ServiceProvider extends AddonServiceProvider
{
    protected $listen = [
        AssetDeleted::class => [
            UpdateImagesMissingAltCache::class,
        ],
        AssetSaved::class => [
            UpdateImagesMissingAltCache::class,
        ],
        AssetUploaded::class => [
            UpdateImagesMissingAltCache::class,
        ],
    ];

    protected $widgets = [
        \Teamnovu\StatamicImagesMissingAlt\Widgets\Widget::class,
    ];

    public function bootAddon()
    {
        //
    }
}
