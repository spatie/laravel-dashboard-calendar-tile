<?php

namespace Spatie\CalendarTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class CalendarTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Livewire::component('calendar-tile', CalendarTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchCalendarEventsCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-calendar-tile');
    }
}
