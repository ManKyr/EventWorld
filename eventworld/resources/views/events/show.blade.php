@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="Eventworld - Music Events all over the World." />
    <meta property="og:description" content="Event - On this page you can see a single event." />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}" />
@endsection
@section('title')
@if (sizeof($event['resultsPage']['results']['event']['performance']) > 1)
    {{$event['resultsPage']['results']['event']['performance'][0]['displayName']}} with {{$event['resultsPage']['results']['event']['performance'][1]['displayName']}}
@else
    {{$event['resultsPage']['results']['event']['performance'][0]['displayName']}}
@endif | ΕventWorld
@endsection
@section('content')
<style>
[tabindex='-1']:focus {
  outline: 0 !important;
}

hr {
  overflow: visible;
  box-sizing: content-box;
  height: 0;
}

h2,
h3,
h5 {
  margin-top: 0;
  margin-bottom: .5rem;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

dfn {
  font-style: italic;
}

strong {
  font-weight: bolder;
}

a {
  text-decoration: none;
  color: black;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}


a:not([href]):not([tabindex]) {
  text-decoration: none;
  color: inherit;
}

a:not([href]):not([tabindex]):hover,
a:not([href]):not([tabindex]):focus {
  text-decoration: none;
  color: inherit;
}

a:not([href]):not([tabindex]):focus {
  outline: 0;
}

img {
  vertical-align: middle;
  border-style: none;
}

caption {
  padding-top: 1rem;
  padding-bottom: 1rem;
  caption-side: bottom;
  text-align: left;
  color: #8898aa;
}



legend {
  font-size: 1.5rem;
  line-height: inherit;
  display: block;
  width: 100%;
  max-width: 100%;
  margin-bottom: .5rem;
  padding: 0;
  white-space: normal;
  color: inherit;
}


::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button;
}

[hidden] {
  display: none !important;
}

h2,
h3,
h5,
.h2,
.h3,
.h5 {
  font-family: inherit;
  font-weight: 600;
  line-height: 1.5;
  margin-bottom: .5rem;
  color: #32325d;
}

h2,
.h2 {
  font-size: 1.25rem;
}

h3,
.h3 {
  font-size: 1.0625rem;
}

h5,
.h5 {
  font-size: .8125rem;
}

hr {
  margin-top: 2rem;
  margin-bottom: 2rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, .1);
}

.btn {
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.5;
  display: inline-block;
  padding: .625rem 1.25rem;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
  border: 1px solid transparent;
  border-radius: .375rem;
}

@media screen and (prefers-reduced-motion: reduce) {
  .btn {
    transition: none;
  }
}

.btn:hover,
.btn:focus {
  text-decoration: none;
}

.btn:focus {
  outline: 0;
  box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn:disabled {
  opacity: .65;
  box-shadow: none;
}

.btn:not(:disabled):not(.disabled) {
  cursor: pointer;
}

.btn:not(:disabled):not(.disabled):active {
  box-shadow: none;
}

.btn:not(:disabled):not(.disabled):active:focus {
  box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08), none;
}

.btn-info {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.btn-info:hover {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
}

.btn-info:focus {
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(17, 205, 239, .5);
}

.btn-info:disabled {
  color: #fff;
  border-color: #11cdef;
  background-color: #11cdef;
}

.btn-info:not(:disabled):not(.disabled):active {
  color: #fff;
  border-color: #11cdef;
  background-color: #0da5c0;
}

.btn-info:not(:disabled):not(.disabled):active:focus {
  box-shadow: none, 0 0 0 0 rgba(17, 205, 239, .5);
}

.btn-default {
  color: #fff;
  border-color: #172b4d;
  background-color: #172b4d;
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.btn-default:hover {
  color: #fff;
  border-color: #172b4d;
  background-color: #172b4d;
}

.btn-default:focus {
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(23, 43, 77, .5);
}

.btn-default:disabled {
  color: #fff;
  border-color: #172b4d;
  background-color: #172b4d;
}

.btn-default:not(:disabled):not(.disabled):active {
  color: #fff;
  border-color: #172b4d;
  background-color: #0b1526;
}

.btn-default:not(:disabled):not(.disabled):active:focus {
  box-shadow: none, 0 0 0 0 rgba(23, 43, 77, .5);
}

.btn-sm {
  font-size: .875rem;
  line-height: 1.5;
  padding: .25rem .5rem;
  border-radius: .375rem;
}

.card_event {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  border: 1px solid rgba(0, 0, 0, .05);
  border-radius: .375rem;
  background-color: #fff;
  background-clip: border-box;
}

.card_event>hr {
  margin-right: 0;
  margin-left: 0;
}

.card_event-body {
  padding: 1.5rem;
  flex: 1 1 auto;
}

.card_event-header {
  margin-bottom: 0;
  padding: 1.25rem 1.5rem;
  border-bottom: 1px solid rgba(0, 0, 0, .05);
  background-color: #fff;
}

.card_event-header:first-child {
  border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
}

@keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0;
  }

  to {
    background-position: 0 0;
  }
}

.bg-default {
  background-color: #172b4d !important;
}

a.bg-default:hover,
a.bg-default:focus,
button.bg-default:hover,
button.bg-default:focus {
  background-color: #0b1526 !important;
}

.border-0 {
  border: 0 !important;
}
.rounded_div {
  border-radius: 50px;
  -webkit-box-shadow: 2px 2px 5px 0px rgba(0, 0, 0, 1);
  -moz-box-shadow: 2px 2px 5px 0px rgba(0, 0, 0, 1);
  box-shadow: 2px 2px 5px 0px rgba(0, 0, 0, 1);
}
.rounded-circle {
  width:500px;
  border-radius: 50% !important;
  top:35px;
}

.d-flex {
  display: flex !important;
}

.justify-content-center {
  justify-content: center !important;
}

.justify-content-between {
  justify-content: space-between !important;
}

.align-items-center {
  align-items: center !important;
}

@media (min-width: 1200px) {
  .justify-content-xl-between {
    justify-content: space-between !important;
  }
}

.float-right {
  float: right !important;
}

.shadow,
.card_event-profile-image img {
  box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}

.mr-2 {
  margin-right: .5rem !important;
}

.mt-4,
.my-4 {
  margin-top: 1.5rem !important;
}

.mr-4 {
  margin-right: 1.5rem !important;
}

.my-4 {
  margin-bottom: 1.5rem !important;
}

.mb-5 {
  margin-bottom: 3rem !important;
}

.mt-7 {
  margin-top: 6rem !important;
}

.pt-0 {
  padding-top: 0 !important;
}

.pb-0 {
  padding-bottom: 0 !important;
}

.pt-8 {
  padding-top: 8rem !important;
}

.m-auto {
  margin: auto !important;
}

@media (min-width: 768px) {
  .mt-md-5 {
    margin-top: 3rem !important;
  }

  .pt-md-4 {
    padding-top: 1.5rem !important;
  }

  .pb-md-4 {
    padding-bottom: 1.5rem !important;
  }
}

@media (min-width: 1200px) {
  .mb-xl-0 {
    margin-bottom: 0 !important;
  }
}

.text-center {
  text-align: center !important;
}

.font-weight-light {
  font-weight: 300 !important;
}

@media print {

  *,
  *::before,
  *::after {
    box-shadow: none !important;
    text-shadow: none !important;
  }

  a:not(.btn) {
    text-decoration: underline;
  }

  img {
    page-break-inside: avoid;
  }

  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }

  h2,
  h3 {
    page-break-after: avoid;
  }

  @ page {
    size: a3;
  }
}

@keyframes floating-lg {
  0% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(15px);
  }

  100% {
    transform: translateY(0px);
  }
}

@keyframes floating {
  0% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(10px);
  }

  100% {
    transform: translateY(0px);
  }
}

@keyframes floating-sm {
  0% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(5px);
  }

  100% {
    transform: translateY(0px);
  }
}

[class*='shadow'] {
  transition: all .15s ease;
}

.font-weight-300 {
  font-weight: 300 !important;
}

.btn {
  font-size: .875rem;
  position: relative;
  transition: all .15s ease;
  letter-spacing: .025em;
  text-transform: none;
  will-change: transform;
}

.btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn:not(:last-child) {
  margin-right: .5rem;
}

.btn i:not(:first-child) {
  margin-left: .5rem;
}

.btn i:not(:last-child) {
  margin-right: .5rem;
}

.btn-sm {
  font-size: .75rem;
}

[class*='btn-outline-'] {
  border-width: 1px;
}

.card_event-profile-image {
  position: relative;
}

.card_event-profile-image img {
  position: absolute;
  left: 50%;
  max-width: 180px;
  transition: all .15s ease;
  transform: translate(-50%, -30%);
  border-radius: .375rem;
}

.card_event-profile-image img:hover {
  transform: translate(-50%, -33%);
}

.card_event-profile-stats {
  padding: 1rem 0;
}

.card_event-profile-stats>div {
  margin-right: 1rem;
  padding: .875rem;
  text-align: center;
}

.card_event-profile-stats>div:last-child {
  margin-right: 0;
}

.card_event-profile-stats>div .heading {
  font-size: 1.1rem;
  font-weight: bold;
  display: block;
}

.card_event-profile-stats>div .description {
  font-size: .875rem;
  color: #adb5bd;
}

.main-content {
  position: relative;
}


@media (min-width: 768px) {
  @ keyframes show-navbar-dropdown {
    0% {
      transition: visibility .25s, opacity .25s, transform .25s;
      transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
      opacity: 0;
    }

    100% {
      transform: translate(0, 0);
      opacity: 1;
    }
  }

  @keyframes hide-navbar-dropdown {
    from {
      opacity: 1;
    }

    to {
      transform: translate(0, 10px);
      opacity: 0;
    }
  }
}

@keyframes show-navbar-collapse {
  0% {
    transform: scale(.95);
    transform-origin: 100% 0;
    opacity: 0;
  }

  100% {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes hide-navbar-collapse {
  from {
    transform: scale(1);
    transform-origin: 100% 0;
    opacity: 1;
  }

  to {
    transform: scale(.95);
    opacity: 0;
  }
}

p {
  font-size: 1rem;
  font-weight: 300;
  line-height: 1.7;
}

.description {
  font-size: .875rem;
}

.heading {
  font-size: .95rem;
  font-weight: 600;
  letter-spacing: .025em;
  text-transform: uppercase;
}

@media (max-width: 768px) {
  .btn {
    margin-bottom: 30px;
    font-size:9px;
  }
  #h1_mob{
    font-size:30px;
  }
  .rounded-circle{
    width:140px;
    height:140px;
    top: 15px;
  }
}

}

</style>

<div class="main-content" style="padding-top:40px;padding-bottom:40px;">
    <div class="container mt-7">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/events">Eventwall</a></li>
                <li class="breadcrumb-item active" aria-current="page">Event</li>
            </ol>
        </nav>    
      <div class="row">
        <div class="col-lg" >
          <div class="card_event card_event-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card_event-profile-image">
                  <a href="#">
                  <a href="{{ route('artists.show', $event['resultsPage']['results']['event']['performance'][0]['artist']['id']) }}"><img src="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['resultsPage']['results']['event']['performance'][0]['artist']['id'].'/huge_avatar')}}" class="rounded-circle"></a>
                  </a>
                </div>
              </div>
            </div>
            <div class="card_event-header text-center pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              @php
                  $venueName = empty($event['resultsPage']['results']['event']['venue']) ? 'Unknown venue' : $event['resultsPage']['results']['event']['venue']['displayName'];
              @endphp
              <form method="POST" action="/preferences">
                        @csrf
                        <!-- <input type="hidden" name="user_id" value=""> -->
                        <input type="hidden" name="event_id" value="{{ $event['resultsPage']['results']['event']['id'] }}">
                        <input type="hidden" name="artist_id" value="{{ $event['resultsPage']['results']['event']['performance'][0]['artist']['id'] }}">
                        <input type="hidden" name="display_name" value="{{ $event['resultsPage']['results']['event']['displayName'] }}">
                        <input type="hidden" name="artist" value="{{ $event['resultsPage']['results']['event']['performance'][0]['artist']['displayName'] }}">
                        <input type="hidden" name="venue" value="{{ $venueName }}">
                        <input type="hidden" name="location" value="{{ $event['resultsPage']['results']['event']['location']['city'] }}">
                        <input type="hidden" name="date" value="{{ $event['resultsPage']['results']['event']['start']['date'] }}">
                        <input type="submit" class="btn btn-sm btn-default mr-4" value="Save to Preference List">
                        @error('event_id')
                        <div class="mt-3 alert alert-warning">The event is already in your preference list.</div>
                        @enderror
                    </form>
                    @php
                        // Spaghetti code but it works :D
                        $startDateForCalendar = date("Ymd", strtotime($event['resultsPage']['results']['event']['start']['date']));
                        $endDateForCalendar = empty($event['resultsPage']['results']['event']['end']['date']) ? $startDateForCalendar : date("Ymd", strtotime($event['resultsPage']['results']['event']['end']['date']));
                        $startTimeForCalendar = date("His", strtotime($event['resultsPage']['results']['event']['start']['time']));
                        $endTimeForCalendar = empty($event['resultsPage']['results']['event']['end']['time']) ? $startTimeForCalendar : date("His", strtotime($event['resultsPage']['results']['event']['end']['time']));

                        $street = empty($event['resultsPage']['results']['event']['venue']) ? 'Unknown street' : $event['resultsPage']['results']['event']['venue']['street'];
                    @endphp
                    <a href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ $event['resultsPage']['results']['event']['performance'][0]['displayName'] }}+{{ $event['resultsPage']['results']['event']['type']}}&dates={{ $startDateForCalendar }}T{{ $startTimeForCalendar }}Z/{{ $endDateForCalendar }}T{{ $endTimeForCalendar }}Z&location={{ $venueName }}+{{ $street }}+{{ $event['resultsPage']['results']['event']['location']['city'] }}&sf=true&output=xml" target="_blank"><span class="btn btn-sm btn-success float-right">Add to Google Calendar</span></a>
              </div>
            </div>
            <div class="card_event-body pt-0 pt-md-4">
              <div class="row">
              <div class="col">
                  <div class="card_event-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="description">Status</span>
                      @if (($event['resultsPage']['results']['event']['status'])!="ok")
                        <span class="heading badge badge-danger">canceled</span>
                      @else
                        <span class="heading badge badge-success">{{$event['resultsPage']['results']['event']['status']}}</span> 
                      @endif  
                    </div>
                    <div>
                      <span class="description">Popularity Index</span>
                      <span class="heading">{{number_format($event['resultsPage']['results']['event']['popularity'],2)*100}}%</span>
                    </div>
                    <div>
                    <span class="description">Age Restriction</span>
                    @if (empty($event['resultsPage']['results']['event']['ageRestriction']))
                        <span class="heading badge badge-success">no</span>
                    @else
                        <span class="heading badge badge-danger">{{$event['resultsPage']['results']['event']['ageRestriction']}}</span>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
              <h1 id="h1_mob"><a href="{{ route('artists.show', $event['resultsPage']['results']['event']['performance'][0]['artist']['id']) }}"><span class="badge badge-secondary">{{ $event['resultsPage']['results']['event']['performance'][0]['displayName'] }}</span></a><span class="badge badge-light"> {{ $event['resultsPage']['results']['event']['type'] }}</span></h1>
                <div class="h3 font-weight-300">
                  <i class="ni location_pin mr-2"></i><a href="#">
                    {{ $event['resultsPage']['results']['event']['location']['city'] }}
                    </a>
                </div>
                <div class="h4 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>@if (empty($event['resultsPage']['results']['event']['venue']))
                    Unknown venue
                @else
                    <a href="#">
                        {{ $event['resultsPage']['results']['event']['venue']['displayName'] }}
                    </a>
                @endif
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{ date('F j, Y', strtotime($event['resultsPage']['results']['event']['start']['date'])) }}
                </div>
                <hr class="my-4">
                <p>
                    <ul class="list-inline">
                    <li class="list-inline-item">Line-up:</li>
                @foreach ($event['resultsPage']['results']['event']['performance'] as $performance)
                        <li class="list-inline-item">{{ $performance['displayName'] }} <span class="badge badge-pill badge-success">{{ $performance['billing'] }}</span></li>
                @endforeach
                </ul></p>
                <hr class="my-4">
                <h4><b>Share this concert</b></h4>
                <div class="sharethis-inline-share-buttons"></div>
                <br>
                <hr class="my-4">
                <h4><b>Venue Location</b></h4>
                <div id="mapid"></div>
                <script>
                    var lat = {{ $event['resultsPage']['results']['event']['location']['lat'] }};
                    var lng = {{ $event['resultsPage']['results']['event']['location']['lng'] }};
                    var mymap = L.map('mapid').setView([lat, lng], 13);
                    var eventname = "{{ $venueName }}";
                    var street = "{{ $street }}";

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(mymap);

                    L.marker([lat, lng]).addTo(mymap)
                        .bindPopup(eventname + ', <br>' + street)
                        .openPopup();
                </script>
                <br/>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow">
            <div class="card-header">
                <h4 class="mb-0"><b>Similar Artists</b></h4>
            </div>
                @php
                $similarArtists = Http::get(
                "https://api.songkick.com/api/3.0/artists/{$event['resultsPage']['results']['event']['performance'][0]['artist']['id']}/similar_artists.json?apikey=" . config('services.sgk.token')
                )
                ->json();
                //dump($similarArtists['resultsPage']['results']['artist']);
                @endphp
                @if (empty($similarArtists['resultsPage']['results']['artist']))
                    <p class="mt-3">No similar artists found.</p>
                @else
                    <ul class="list-unstyled text-center mt-3">
                    @foreach (array_slice($similarArtists['resultsPage']['results']['artist'],0,10) as $artist)
                    <li><h2><a href="{{ route('artists.show', $artist['id']) }}"><span class="badge badge-secondary badge-similar">{{ $artist['displayName'] }}</span></a></h2></li>
                    @endforeach
                    </ul>
                @endif
                </div>
            </div>
      </div>
    </div>
  </div>
@endsection
