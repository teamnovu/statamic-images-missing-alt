<?php

namespace Teamnovu\StatamicImagesMissingAlt\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Statamic\Widgets\Widget;
use Statamic\Facades\Asset;
use \Statamic\Facades\AssetContainer;

class ImagesMissingAlt extends Widget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        $expiration = Carbon::now()->addSeconds($this->config('expiry', 0));

        $assets = Cache::remember('widgets::StatamicImagesMissingAlt', $expiration, function() {
            return Asset::query()
                ->where('container', $this->config('container', 'assets'))
                ->whereNull('alt')
                ->orderBy('last_modified', 'desc')
                ->limit(100)
                ->get()
                ->toAugmentedArray();
        });

        $assets = collect($assets);

        return view('statamic-images-missing-alt::widgets.images-missing-alt', [
            'assets' => $assets->slice(0, $this->config('limit', 5)),
            'amount' => count($assets),
            'container' => AssetContainer::findByHandle($this->config('container', 'assets'))->title(),
        ]);
    }
}