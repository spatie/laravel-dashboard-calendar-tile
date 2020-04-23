<x-dashboard-tile :position="$position">
    <div wire:poll.{{ $refreshIntervalInSeconds }}s class="grid h-full">
        <ul class="self-center divide-y-2 divide-canvas">
            @foreach($events as $event)
                <li class="py-1">
                    <div class="my-2">
                        <div class="{{ $event['withinWeek'] ? 'font-bold' : '' }}">{{ $event['name'] }}</div>
                        <div class="text-sm text-dimmed">
                            {{ $event['date']->format('d.m.Y') }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-dashboard-tile>
