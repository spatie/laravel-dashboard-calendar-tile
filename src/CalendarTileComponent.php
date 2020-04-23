<?php

namespace Spatie\CalendarTile;

use Livewire\Component;

class CalendarTileComponent extends Component
{
    /** @var string */
    public $calendarId;

    /** @var string */
    public $position;

    /** @var string|null */
    public $title;

    /** @var int */
    public $refreshInSeconds;

    public function mount(string $calendarId, string $position, ?string $title = null, int $refreshInSeconds = 60)
    {
        $this->calendarId = $calendarId;

        $this->position = $position;

        $this->title = $title;

        $this->refreshInSeconds = $refreshInSeconds;
    }

    public function render()
    {
        return view('dashboard-calendar-tile::tile', [
            'events' => CalendarStore::make()->eventsForCalendarId($this->calendarId),
            'refreshIntervalInSeconds' => config('dashboard.tiles.calendar.refresh_interval_in_seconds') ?? 60
        ]);
    }
}
