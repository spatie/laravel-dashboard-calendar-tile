<?php

namespace Spatie\CalendarTile;

use Livewire\Component;

class CalendarTileComponent extends Component
{
    /** @var string */
    public $calendarId;

    /** @var string */
    public $position;

    public function mount(string $calendarId, string $position)
    {
        $this->calendarId = $calendarId;

        $this->position = $position;
    }

    public function render()
    {
        return view('dashboard-calendar-tile::tile', [
            'events' => CalendarStore::make()->eventsForCalendarId($this->calendarId),
            'refreshIntervalInSeconds' => config('dashboard.tiles.calendar.refresh_interval_in_seconds') ?? 60
        ]);
    }
}
