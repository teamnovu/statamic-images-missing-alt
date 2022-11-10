<?php

namespace Teamnovu\StatamicImagesMissingAlt;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $viewNamespace = 'statamic-images-missing-alt';

    protected $widgets = [
        \Teamnovu\StatamicImagesMissingAlt\Widgets\ImagesMissingAlt::class,
    ];

    public function bootAddon()
    {
        //
    }
}
