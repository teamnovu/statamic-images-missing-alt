<ui-card inset>
    <header class="border-b min-h-12 border-gray-200 dark:border-gray-700">
        <div class="flex items-center min-h-12 px-4.5 py-2 justify-between">
            <ui-heading icon="assets" :level="3" size="lg">
                @if (count($containers) === 1)
                    <span>{{ __('statamic-images-missing-alt::images-missing-alt.title-for-container', ['container' => $containers[0]]) }}</span>
                @else
                    <span>{{ __('statamic-images-missing-alt::images-missing-alt.title') }}</span>
                @endif
            </ui-heading>

            <ui-popover class="max-w-105 w-full">
                <template #trigger>
                    <ui-button icon="info-square" size="xs" icon-only />
                </template>

                <div class="border-b mb-4 pb-4 border-gray-200">
                    <ui-heading :level="3" size="lg" icon="info-square">
                        {{ __('statamic-images-missing-alt::images-missing-alt.title') }}
                    </ui-heading>
                </div>
                <div>
                    <p class="text-sm my-3!">
                        {{ __('statamic-images-missing-alt::images-missing-alt.explanation') }}
                    </p>
                </div>
            </ui-popover>
        </div>
    </header>

    <div class="p-4">
        @if ($assets->isNotEmpty())
            <div class="mb-4">
                <ui-alert variant="warning"
                    text="{{ trans_choice('statamic-images-missing-alt::images-missing-alt.count', $amount, ['amount' => $amount]) }}" />
            </div>

            <div class="overflow-auto">
                <ui-table>
                    <ui-table-rows>
                        @foreach ($assets as $asset)
                            <ui-table-row>
                                <ui-table-cell>
                                    <a href="{{ $asset['edit_url'] }}"
                                        aria-label="{{ __('statamic-images-missing-alt::images-missing-alt.edit') }}"
                                        class="flex items-center">
                                        <div class="little-dot mr-2 bg-red-500"></div>
                                        {{ $asset['basename'] }}
                                    </a>
                                </ui-table-cell>
                            </ui-table-row>
                        @endforeach
                    </ui-table-rows>
                </ui-table>
            </div>
        @else
            <div class="content">
                <ui-alert variant="success" text="{{ __('statamic-images-missing-alt::images-missing-alt.done') }}" />
            </div>
        @endif
    </div>
</ui-card>
