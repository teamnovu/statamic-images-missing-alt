<?php

namespace Teamnovu\StatamicImagesMissingAlt\Listeners;

use Statamic\Events\AssetDeleted;
use Statamic\Events\AssetSaved;
use Statamic\Events\AssetUploaded;
use Teamnovu\StatamicImagesMissingAlt\Jobs\UpdateMissingAltCacheJob;

class UpdateImagesMissingAltCacheListener
{
    public function handle($event)
    {
        UpdateMissingAltCacheJob::dispatch($event);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(AssetDeleted::class, [self::class, 'handle']);
        $events->listen(AssetSaved::class, [self::class, 'handle']);
        $events->listen(AssetUploaded::class, [self::class, 'handle']);
    }
}
