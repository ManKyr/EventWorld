<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Cache;
use Http;

class FetchImages extends Command
{

    protected $signature = 'images:fetch';

    protected $description = 'Fetch images from API';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $upcomingEvents = Cache::remember("songkick_events_$ip", 3000, function () use ($id) {
            return Http::get(
                "https://api.songkick.com/api/3.0/metro_areas/$id/calendar.json?apikey=" . config('services.sgk.token')
            )
                ->json()['resultsPage']['results']['event'];
        });
    }
}
