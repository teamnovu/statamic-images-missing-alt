<?php

namespace Teamnovu\StatamicImagesMissingAlt\Widgets;

use Statamic\Widgets\Widget as BaseWidget;
use \Statamic\Facades\AssetContainer;

class Widget extends BaseWidget
{
    protected static $handle = 'images_missing_alt';

    public function __construct(
        protected \Teamnovu\StatamicImagesMissingAlt\Services\Service $service,
    ) {}

    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        $container = $this->config('container', 'assets');

        $assets = collect($this->service->getImagesWithMissingAlt($container));

        return view('statamic-images-missing-alt::widgets.images-missing-alt', [
            'assets' => $assets->slice(0, $this->config('limit', 5)),
            'amount' => $assets->count(),
            'container' => AssetContainer::findByHandle($container)->title(),
        ]);
    }
}