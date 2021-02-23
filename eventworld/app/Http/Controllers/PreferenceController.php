<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the currently authenticated user's ID
        $id = Auth::id();
        $preferences = Preference::latest()->where('user_id', $id)->paginate(5);

        return view('preferences.index', ['preferences' => $preferences]);
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
        // Validate the request
        // The venue could be null
        // but we can change this directly in the db
        /*request()->validate([
            'event_id' => 'required|unique:preferences',
        ]);*/

        $preference = new Preference();
        // Retrieve the currently authenticated user
        $currentUser = $request->user();
        $preference->user_id      = $currentUser->id;
        $preference->event_id     = $request->event_id;
        $preference->artist_id    = $request->artist_id;
        $preference->display_name = $request->display_name;
        $preference->artist       = $request->artist;
        $preference->venue        = $request->venue;
        $preference->location     = $request->location;
        $preference->date         = $request->date;
        // dd($preference);
        $preference->save();

        return redirect('/preferences');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function show(Preference $preference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function edit(Preference $preference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preference $preference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preference = Preference::find($id);
        $preference->delete();

        return redirect('/preferences')->with('success', 'Preference removed successfully.');
    }
}
