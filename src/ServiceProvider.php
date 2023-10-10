<?php

namespace Teamnovu\StatamicImagesMissingAlt;

use Statamic\Providers\AddonServiceProvider;
use Teamnovu\StatamicImagesMissingAlt\Listeners\UpdateImagesMissingAltCacheListener;

class ServiceProvider extends AddonServiceProvider
{
    protected $subscribe = [
        UpdateImagesMissingAltCacheListener::class,
    ];

    protected $widgets = [
        \Teamnovu\StatamicImagesMissingAlt\Widgets\Widget::class,
    ];

    public function bootAddon()
    {
        //
    }
}
