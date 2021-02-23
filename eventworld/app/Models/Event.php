<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;
use Http;

class Event extends Model
{
    use HasFactory;

    public static  function getEventsByCity($city)
    {
        $id = ($city == "athens") ? "28976" : "28999";

        $events =  Cache::remember("songkick_events_$city", 3000, function () use ($id) {
            try {
                return Http::get(
                    "https://api.songkick.com/api/3.0/metro_areas/$id/calendar.json?apikey=" . config('services.sgk.token')
                )
                    ->json()['resultsPage']['results']['event'];
            } catch (\Exception $e) {
                return collect();
            }
        });

        return $events;
    }

    public static function getPopularEvents()
    {

        $athensEvents = static::getEventsByCity('athens');
        $thessalonikiEvents = static::getEventsByCity('thessaloniki');

        $popularEvents = collect($athensEvents)->merge(collect($thessalonikiEvents))->filter(function ($ev) {
            return $ev['popularity'] > 0.1;
        })->shuffle();

        return $popularEvents;
    }
}
