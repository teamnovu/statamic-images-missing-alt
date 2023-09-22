<?php

namespace Teamnovu\StatamicImagesMissingAlt\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Statamic\Assets\Asset;

class UpdateMissingAltCacheJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $tries = 2;

    protected $event;

    /**
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    public function handle(\Teamnovu\StatamicImagesMissingAlt\Services\Service $service)
    {
        /** @var Asset $asset */
        $asset = $this->event->asset;
        $container = $asset->container();

        $service->clearCache($container->handle());
        $service->preloadCache($container->handle());
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array<int, object>
     */
    public function middleware()
    {
        return [(new WithoutOverlapping())->releaseAfter(60)->expireAfter(180)];
    }
}
