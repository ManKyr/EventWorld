<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mail;
use  App\Notifications\SendContactEmail;
use Cache;

class EventController extends Controller
{

    public function welcome()
    {
        $popularEvents = Event::getPopularEvents();

        return view('welcome', compact('popularEvents'));
    }

    public function contactPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        \Notification::route('mail', 'ev3ntworld@gmail.com')->notify(new SendContactEmail($request->get('name'), $request->get('email'), $request->get('subject'), $request->get('message')));


        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');
    }

    public function about()
    {
        return view('about');
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }

    public function index()
    {


        // $ip = request()->ip();

        $ip = "5.54.64.82"; //for thessaloniki


        $id = Cache::remember("songkick_ip_$ip", 3000, function () use ($ip) {
            try {
                return  Http::get("https://api.songkick.com/api/3.0/search/locations.json?location=ip:{$ip}&apikey=" . config('services.sgk.token'))
                    ->json()['resultsPage']['results']['location'][0]['metroArea']['id'];
            } catch (\Exception $e) {
                return  '-1';
            }
        });

        //$cities = array('user_location' => "$id", 'Athens' => '28976', 'Thessaloniki' => '28999');

        $upcomingEvents = Cache::remember("songkick_events_$ip", 3000, function () use ($id) {
            try {
                return Http::get(
                    "https://api.songkick.com/api/3.0/metro_areas/$id/calendar.json?apikey=" . config('services.sgk.token')
                )
                    ->json()['resultsPage']['results']['event'];
            } catch (\Exception $e) {
                return collect();
            }
        });

        $athensEvents =  Event::getEventsByCity('athens');
        $thessalonikiEvents = Event::getEventsByCity('thessaloniki');
        $popularEvents = Event::getPopularEvents();


        return view('events/index', ['events' => $upcomingEvents, 'popularEvents' => $popularEvents, 'thessalonikiEvents' => $thessalonikiEvents, 'athensEvents' => $athensEvents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * We had to pass an ID for the event
     * instead of an Event object so that
     * we can make another api call.
     *
     * @param  \App\Models\Event
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // https://api.songkick.com/api/3.0/events/{event_id}.json?apikey={your_api_key}
        $event = Http::get(
            'https://api.songkick.com/api/3.0/events/' . $id . '.json?apikey=' . config('services.sgk.token')
        )
            ->json();
        //dump($event);

        return view('events/show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
