@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="Eventwall - Music Events all over the world" />
    <meta property="og:description" content="Eventwall - Artist Page -  " />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}" />
@endsection
@section('title')
@if(empty($artist['resultsPage']['results']))  @else {{$artist['resultsPage']['results']['event'][0]['performance'][0]['displayName']}} @endif  | ΕventWorld
@endsection
@section('content')
<style>

.timeline {
  list-style: none;
  padding: 0;
  position: relative;
}

.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #6c7293;
  left: 50%;
  margin-left: -1.5px;
}

.timeline .timeline-wrapper {
  display: block;
  margin-bottom: 20px;
  position: relative;
  width: 100%;
  padding-right: 90px;
}

.timeline .timeline-wrapper:before {
  content: " ";
  display: table;
}

.timeline .timeline-wrapper:after {
  content: " ";
  display: table;
  clear: both;
}

.timeline .timeline-wrapper .timeline-panel {
  border-radius: 2px;
  padding: 20px;
  position: relative;
  background: #ffffff;
  border-radius: 6px;
  box-shadow: 1px 2px 35px 0 rgba(1, 1, 1, 0.1);
  width: 35%;
  margin-left: 15%;
}

.timeline .timeline-wrapper .timeline-panel:before {
  position: absolute;
  top: 0;
  width: 100%;
  height: 2px;
  content: "";
  left: 0;
  right: 0;
}

.timeline .timeline-wrapper .timeline-panel:after {
  position: absolute;
  top: 10px;
  right: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-left: 14px solid #ffffff;
  border-right: 0 solid #ffffff;
  border-bottom: 14px solid transparent;
  content: " ";
}

.timeline .timeline-wrapper .timeline-panel .timeline-title {
  margin-top: 0;
  color: #001737;
  text-transform: uppercase;
}

.timeline .timeline-wrapper .timeline-panel .timeline-body p + p {
  margin-top: 5px;
}

.timeline .timeline-wrapper .timeline-panel .timeline-body ul {
  margin-bottom: 0;
}

.timeline .timeline-wrapper .timeline-panel .timeline-footer span {
  font-size: .6875rem;
}

.timeline .timeline-wrapper .timeline-panel .timeline-footer i {
  font-size: 1.5rem;
}

.timeline .timeline-wrapper .timeline-badge {
  width: 14px;
  height: 14px;
  position: absolute;
  top: 16px;
  left: calc(50% - 7px);
  z-index: 10;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
  border: 2px solid #ffffff;
}

.timeline .timeline-wrapper .timeline-badge i {
  color: #ffffff;
}

.timeline .timeline-wrapper.timeline-inverted {
  padding-right: 0;
  padding-left: 90px;
}

.timeline .timeline-wrapper.timeline-inverted .timeline-panel {
  margin-left: auto;
  margin-right: 15%;
}

.timeline .timeline-wrapper.timeline-inverted .timeline-panel:after {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}

@media (max-width: 767px) {
  .timeline .timeline-wrapper {
    padding-right: 90px;
  }
  .timeline .timeline-wrapper.timeline-inverted {
    padding-left: 90px;
  }
  .timeline .timeline-wrapper .timeline-panel {
    width: 80%;
    margin-left: 0;
    margin-right: 0;
    padding: 15px;
  }
  .timeline .timeline-wrapper .timeline-badge {
    display:none;
  }
}

@media (max-width: 576px) {
  .timeline .timeline-wrapper .timeline-panel {
    width: 88%;
  }
  .mob_h1{
    font-size:24px;
  }
}

.timeline-wrapper-primary .timeline-panel:before {
  background: #464dee;
}

.timeline-wrapper-primary .timeline-badge {
  background: #464dee;
}

.timeline-wrapper-secondary .timeline-panel:before {
  background: #6c7293;
}

.timeline-wrapper-secondary .timeline-badge {
  background: #6c7293;
}

.timeline-wrapper-success .timeline-panel:before {
  background: #0ddbb9;
}

.timeline-wrapper-success .timeline-badge {
  background: #0ddbb9;
}

.timeline-wrapper-info .timeline-panel:before {
  background: #0ad7f7;
}

.timeline-wrapper-info .timeline-badge {
  background: #0ad7f7;
}

.timeline-wrapper-warning .timeline-panel:before {
  background: #fcd539;
}

.timeline-wrapper-warning .timeline-badge {
  background: #fcd539;
}

.timeline-wrapper-danger .timeline-panel:before {
  background: #ef5958;
}

.timeline-wrapper-danger .timeline-badge {
  background: #ef5958;
}

.timeline-wrapper-light .timeline-panel:before {
  background: #eaeaea;
}

.timeline-wrapper-light .timeline-badge {
  background: #eaeaea;
}

.timeline-wrapper-dark .timeline-panel:before {
  background: #001737;
}

.timeline-wrapper-dark .timeline-badge {
  background: #001737;
}


/* Cards */
.card {
  box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  -ms-box-shadow: none;
}

.card .card-body {
  padding: 1.75rem 1.75rem;
}

.card .card-body + .card-body {
  padding-top: 1rem;
}

.card .card-title {
  color: #001737;
  margin-bottom: .5rem;
  text-transform: capitalize;
  font-size: 0.875rem;
}

.card .card-subtitle {
  font-weight: 400;
  margin-top: 0.625rem;
  margin-bottom: 0.625rem;
}

.card .card-description {
  margin-bottom: .875rem;
  font-weight: 400;
  color: #76838f;
}

.card.card-outline-success {
  border: 1px solid #0ddbb9;
}

.card.card-outline-primary {
  border: 1px solid #464dee;
}

.card.card-outline-warning {
  border: 1px solid #fcd539;
}

.card.card-outline-danger {
  border: 1px solid #ef5958;
}

.card.card-rounded {
  border-radius: 5px;
}

.card.card-faded {
  background: #b5b0b2;
  border-color: #b5b0b2;
}

.card.card-circle-progress {
  color: #ffffff;
  text-align: center;
}

.card.card-img-holder {
  position: relative;
}

.card.card-img-holder .card-img-absolute {
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
}

.card.card-weather .weather-daily .weather-day {
  opacity: .5;
  font-weight: 900;
}

.card.card-weather .weather-daily i {
  font-size: 20px;
}

.card.card-weather .weather-daily .weather-temp {
  margin-top: .5rem;
  margin-bottom: 0;
  opacity: .5;
  font-size: .75rem;
}

.card-inverse-primary {
  background: rgba(70, 77, 238, 0.2);
  border: 1px solid #4047db;
  color: #353bb5;
}

.card-inverse-secondary {
  background: rgba(108, 114, 147, 0.2);
  border: 1px solid #636987;
  color: #525770;
}

.card-inverse-success {
  background: rgba(13, 219, 185, 0.2);
  border: 1px solid #0cc9aa;
  color: #0aa68d;
}

.card-inverse-info {
  background: rgba(10, 215, 247, 0.2);
  border: 1px solid #09c6e3;
  color: #08a3bc;
}

.card-inverse-warning {
  background: rgba(252, 213, 57, 0.2);
  border: 1px solid #e8c434;
  color: #c0a22b;
}

.card-inverse-danger {
  background: rgba(239, 89, 88, 0.2);
  border: 1px solid #dc5251;
  color: #b64443;
}

.card-inverse-light {
  background: rgba(234, 234, 234, 0.2);
  border: 1px solid #d7d7d7;
  color: #b2b2b2;
}

.card-inverse-dark {
  background: rgba(0, 23, 55, 0.2);
  border: 1px solid #001533;
  color: #00112a;
}
</style>
@php
  $lat = array();
  $lon = array();
  $venueName = array();
  $city = array();

  $string = url()->previous();
  $exploded = explode('/', $string);
@endphp
<div class="container" data-aos="fade-up" style="padding-top:190px;padding-bottom:190px;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb"></li>
   <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/events">Eventwall</a></li>
    <li class="breadcrumb-item"><a href="/event/{{end($exploded)}}">Event</a> </li>
      @if(!empty($artist['resultsPage']['results']))  
        <li class="breadcrumb-item active" aria-current="page">{{$artist['resultsPage']['results']['event'][0]['performance'][0]['displayName']}}</li>
      @endif
  </ol>
</nav>
  <div class="row">
    <div class="col-12">
      @if(empty($artist['resultsPage']['results']) || empty($artist['resultsPage']['results']['event'][0]['performance'][0]['displayName']))
      <div class="card">
        <div class="card-header"><b>Upcoming Event Timeline from artist</b></div>
        <div class="card-body ">
        <a href="#"><p class="card-description text-center text-success">"Sorry.There is no data for this artist"</p></a>
        </div>
      </div>
      @else
      <div class="card">
        <div class="card-header"><b>Upcoming Event Timeline from artist</b></div>
        <div class="card-body ">
          <a href="#"><h1 class="card-description text-center text-success mob_h1"><span class="badge badge-secondary">{{$artist['resultsPage']['results']['event'][0]['performance'][0]['displayName']}}</span></h1></a>
        </div>
      <div class="card" >
        <div class="card-body">
          <div class="mt-5">
            <div class="timeline">
              @foreach(array_slice($artist['resultsPage']['results']['event'],0,3) as $event)
                <div class="timeline-wrapper timeline-wrapper-success">
                  <div class="timeline-badge"></div>
                    <div class="timeline-panel">
                      <figure>
                        <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><img src="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="img-fluid fillwidth" alt=""></a>
                      </figure>
                      <div class="timeline-heading">
                       <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><h6 class="timeline-title text-success">{{$event['performance'][0]['displayName']}}</h6></a>
                      </div>
                      <div class="timeline-body">
                        <p>@if(sizeof($event['performance'])>1)
                             {{$event['performance'][0]['displayName']}} with {{$event['performance'][1]['displayName']}}
                          @if(sizeof($event['performance'])>2)
                            and {{$event['performance'][2]['displayName']}}
                          @endif
                          @else
                            {{$event['performance'][0]['displayName']}}
                          @endif at {{$event['venue']['displayName']}} in {{$event['venue']['metroArea']['displayName']}}</p>
                      </div>
                      <div class="timeline-footer d-flex align-items-center flex-wrap">
                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                        <a href="#maps"><span>{{ $event['location']['city'] }}</span></a>
                        <span class="ml-md-auto font-weight-bold">{{date("jS F, Y",  strtotime($event['start']['date']))}}</span>
                      </div>
                    </div>
                  </div>
                <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                  <div class="timeline-badge"></div>
                  <div class="timeline-panel">
                    <figure>
                      <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><img src="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="img-fluid fillwidth" alt=""></a>
                    </figure>
                    <div class="timeline-heading">
                      <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><h6 class="timeline-title text-danger">{{$event['performance'][0]['displayName']}}</h6></a>
                    </div>
                    <div class="timeline-body">
                      <p>@if(sizeof($event['performance'])>1)
                             {{$event['performance'][0]['displayName']}} with {{$event['performance'][1]['displayName']}}
                          @if(sizeof($event['performance'])>2)
                            and {{$event['performance'][2]['displayName']}}
                          @endif
                          @else
                            {{$event['performance'][0]['displayName']}}
                          @endif at {{$event['venue']['displayName']}} in {{$event['venue']['metroArea']['displayName']}} at {{$event['venue']['displayName']}} in {{$event['venue']['metroArea']['displayName']}}</p>
                    </div>
                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                      <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                      <a href="#maps"><span class="text-danger">{{ $event['location']['city'] }}</span></a>
                      <span class="ml-md-auto font-weight-bold">{{date("jS F, Y",  strtotime($event['start']['date']))}}</span>
                    </div>
                  </div>
                </div>
                 @php
                  if((sizeof($artist['resultsPage']['results']['event']))>1){
                    for($i=0;$i<(sizeof($artist['resultsPage']['results']['event']));$i++){
                      $lat[$i] = $artist['resultsPage']['results']['event'][$i]['location']['lat'];
                      $lon[$i] = $artist['resultsPage']['results']['event'][$i]['location']['lng'];
                      $venueName[$i] = $artist['resultsPage']['results']['event'][$i]['venue']['displayName'];
                      $city[$i] = $artist['resultsPage']['results']['event'][$i]['location']['city'];
                    }        
                  }
                @endphp 
              @endforeach
            @endif      
            </div>
          </div>    
        </div> 
      @if(!empty($artist['resultsPage']['results']['event']))
        <div id="maps" class="card">
          <div class="card-header"><b>Venue Location</b></div>
          <div class="card-body">
            <div id="mapid_artists"></div>
            <script>
              var lat = {{ json_encode($lat)}};
              var lng = {{ json_encode($lon)}};
              var mymap = L.map('mapid_artists').setView([lat[0], lng[0]], 4);
              var eventname = [<?php echo '"'.implode('","', $venueName).'"' ?>];
              var city = [<?php echo '"'.implode('","', $city).'"' ?>];
              
              
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                  }).addTo(mymap);
              
              for(var i = 0; i <= 6; i++){     
                  L.marker([lat[i], lng[i]]).addTo(mymap)
                      .bindPopup(city[i] + ', <br>' + eventname[i])
                      .openPopup();
                  }
                  ;
            </script>
        </div>
      </div>
     @endif 
    </div>
  </div>
</div>

@endsection