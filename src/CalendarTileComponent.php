<?php

namespace Spatie\CalendarTile;

use Illuminate\Contracts\View\View;
use Spatie\Dashboard\Components\BaseTileComponent;

class CalendarTileComponent extends BaseTileComponent
{
    public string $calendarId = '';

    public ?string $title = null;

    public ?int $refreshInSeconds = null;

    public function mount(?string $calendarId = null, ?string $title = null, ?int $refreshInSeconds = null): void
    {
        $this->calendarId = $calendarId ?? config('dashboard.tiles.calendar.ids')[0];

        $this->title = $title;

        $this->refreshInSeconds = $refreshInSeconds;
    }

    public function render(): View
    {
        return view('dashboard-calendar-tile::tile', [
            'events' => CalendarStore::make()->eventsForCalendarId($this->calendarId),
            'refreshIntervalInSeconds' => $this->refreshInSeconds ?? config('dashboard.tiles.calendar.refresh_interval_in_seconds') ?? 60,
        ]);
    }
}
