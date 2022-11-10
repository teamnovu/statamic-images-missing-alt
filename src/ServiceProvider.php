<?php

namespace Teamnovu\StatamicImagesMissingAlt;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $widgets = [
        \Teamnovu\StatamicImagesMissingAlt\Widgets\ImagesMissingAlt::class,
    ];

    public function bootAddon()
    {
        //
    }
}
