<div class="card p-0 overflow-hidden h-full">
    <div class="flex justify-between items-center pt-2 px-2">
        <h2>
            <div class="flex items-center">
                <div class="h-6 w-6 mr-1 text-gray-800">
                    @cp_svg('icons/light/assets')
                </div>
                @if (count($containers) === 1)
                    <span>{{ __('statamic-images-missing-alt::images-missing-alt.title-for-container', ['container' => $containers[0]]) }}</span>
                @else
                    <span>{{ __('statamic-images-missing-alt::images-missing-alt.title') }}</span>
                @endif
            </div>
        </h2>
    </div>
    <div class="content p-2">
        <p>
            {{ __('statamic-images-missing-alt::images-missing-alt.explanation') }}
        </p>
        <p class="font-bold">
            {{ trans_choice('statamic-images-missing-alt::images-missing-alt.count', $amount, ['amount' => $amount]) }}
        </p>
    </div>

    @if ($assets)
        <table tabindex="0" class="data-table">
            <tbody tabindex="0">
    @endif
    @forelse ($assets as $asset)
        <tr class="sortable-row outline-none" tabindex="0">
            <td>
                <div class="flex items-center">
                    <div class="little-dot mr-2 bg-red-500"></div>
                    <a href="{{ $asset['edit_url'] }}" aria-label="{{ __('statamic-images-missing-alt::images-missing-alt.edit') }}">{{ $asset['basename'] }}</a>
                </div>
            </td>
            <td class="actions-column"></td>
        </tr>
    @empty
        <div class="content p-2">
            <p>{{ __('statamic-images-missing-alt::images-missing-alt.done') }}</p>
        </div>
    @endforelse
    @if ($assets)
            </tbody>
        </table>
    @endif
</div>
