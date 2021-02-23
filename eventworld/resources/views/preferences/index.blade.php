@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="Eventworld - Music Events all over the world" />
    <meta property="og:description" content="Eventworld - Music Events all over the world. Event Preferences of each user." />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}"/>
@endsection
@section('title')
    My Preferences | ΕventWorld
@endsection
@section('content')

    <div class="container" style="padding-top: 150px; padding-bottom: 100px;">
        @if (!count($preferences))
            <div class="alert alert-light border" role="alert">
            <h4 class="alert-heading">No preferences yet!</h4>
                <p>Here you can create a list and add or delete events that you like. Visit the <a href="/events">Eventwall</a> and add as many as you want!</p>
            <hr>
            <p class="mb-0">The events in this list will be sorted by the date added to your Preference List.</p>
            </div>
        @else
            <header class="section-header">
                <h3 class="section-title">My Preference List</h3>
            </header>
            @if (session('success'))
                <div class="alert alert-success mb-0">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <div class="table-wrapper my-0 pb-0">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><a href="/events">< Back to Eventwall</a></div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Event</th>
                            <th>Artist</th>
                            <th>Venue</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Added at</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($preferences as $preference)
                            <tr>
                                <td><a href="event/{{ $preference['event_id'] }}">{{ $preference['display_name'] }}</a></td>
                                <td>{{ $preference['artist'] }}</td>
                                <td>{{ $preference['venue'] }}</td>
                                <td>{{ $preference['location'] }}</td>
                                <td>{{ date('F j, Y', strtotime($preference['date'])) }}</td>
                                <td>{{ date('F j, Y', strtotime($preference['created_at'])) }}</td>
                                <td>
                                    <form action="/preferences/delete/{{ $preference['id'] }}" method="POST" id="delete{{ $preference['id'] }}" class="ml-2">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $preference['id'] }}">
                                        <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Delete from list"><i class="material-icons"></i></button>
                                        {{-- <button type="submit">X</button> --}}
                                    </form>
                                    <script>
                                        $( "#delete{{ $preference['id'] }}" ).submit(function( event ) {
                                            if (confirm('Are you sure you want to delete this event from your list?')) {
                                                // Delete it
                                            } else {
                                                // Do nothing
                                                event.preventDefault();
                                            }
                                        });
                                    </script>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $preferences->links('vendor/pagination/default') }}
        @endif
    </div>

@endsection
