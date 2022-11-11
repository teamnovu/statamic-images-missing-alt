<?php

namespace Teamnovu\StatamicImagesMissingAlt\Listeners;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Statamic\Assets\Asset;
use Statamic\Events\AssetDeleted;
use Statamic\Events\AssetSaved;
use Statamic\Events\AssetUploaded;

class UpdateImagesMissingAltCache implements ShouldQueue
{
    use Queueable;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(
        protected \Teamnovu\StatamicImagesMissingAlt\Services\Service $service,
    ) {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AssetDeleted|AssetSaved|AssetUploaded $event)
    {
        /** @var Asset $asset */
        $asset = $event->asset;
        $container = $asset->container();

        $this->service->clearCache($container->handle());
        $this->service->preloadCache($container->handle());
    }
}
