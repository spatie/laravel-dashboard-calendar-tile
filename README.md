# A tile to display events from Google Calendar

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-dashboard-calendar-tile.svg?style=flat-square)](https://packagist.org/packages/spatie/:package_name)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/spatie/laravel-dashboard-calendar-tile/run-tests?label=tests)](https://github.com/spatie/:package_name/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-dashboard-calendar-tile.svg?style=flat-square)](https://packagist.org/packages/spatie/:package_name)

This tile is meant to be used on the [Laravel Dashboard](https://github.com/spatie/laravel-dashboard).

![screenshot](TODO: add link)

## Support us

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us). 

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require spatie/laravel-dashboard-calendar-tile
```

You must also [set up](https://github.com/spatie/laravel-google-calendar#installation) the `spatie/laravel-google-calendar` package. That package will fetch data for Google Calendar. Here are instructions that show how you can [obtain credentials to communicate with Google Calendar](https://github.com/spatie/laravel-google-calendar#how-to-obtain-the-credentials-to-communicate-with-google-calendar).

In the `dashboard` config file, you must add this configuration in the `tiles` key. The `ids` should contain any calendar id that you want to display on the dashboard

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'calendar' => [
            'ids' => [
                env('GOOGLE_CALENDAR_ID'),
            ]
        ],
];
```

In `app\Console\Kernel.php` you should schedule the `Spatie\CalendarTile\FetchCalendarEventsCommand` to run. You can let in run every minute if you want. You could also run is less frequently if you fast updates on the dashboard aren't that important for this tile.

```php
// in app/console/Kernel.php

protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(Spatie\CalendarTile\FetchCalendarEventsCommand::class)->everyMinute();
}
```

## Usage

In your dashboard view you use the `livewire:calendar-tile` component. You should pass the calendar id for your calendar to the `calendar-id` property.

```html
<x-dashboard>
    <livewire:calendar-tile position="e7:e16" :calendar-id="config('google-calendar.calendar_id')"/>
</x-dashboard>
```


## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
