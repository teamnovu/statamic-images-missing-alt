<?php

namespace Teamnovu\StatamicImagesMissingAlt\Widgets;

use Statamic\Facades\AssetContainer;
use Statamic\Widgets\Widget as BaseWidget;

class Widget extends BaseWidget
{
    protected static $handle = 'images_missing_alt';

    public function __construct(
        protected \Teamnovu\StatamicImagesMissingAlt\Services\Service $service,
    ) {
    }

    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        $container = $this->config('container', 'assets');

        $containers = collect(is_array($container) ? $container : [$container]);

        $assets = $containers->reduce(
            fn ($assets, $container) => $assets->merge($this->service->getImagesWithMissingAlt($container)),
            collect(),
        );

        $assets = $assets->sortByDesc('last_modified')->values();

        return view('statamic-images-missing-alt::widgets.images-missing-alt', [
            'assets' => $assets->slice(0, $this->config('limit', 5)),
            'amount' => $assets->count(),
            'containers' => $containers->map(fn (string $container) => AssetContainer::findByHandle($container)->title()),
        ]);
    }
}
