@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="Eventwall - Music Events all over the world" />
    <meta property="og:description" content="Eventwall - Music Events all over the world. There you can check the nearest and most popular events." />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}" />
@endsection
@section('title')
 My EventWall | ΕventWorld
@endsection
@section('content')

     <!-- ======= Popular Upcoming Events Section ======= -->
     <section id="portfolio" class="section-bg" style="padding-top:190px;padding-bottom:190px;">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Popular Upcoming Events</h3>
        </header>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class=" col-lg-12">
          <ul id="portfolio-flters">
            @if(count($events) != 0)
              <li data-filter=".filter-near" class="filter-active">Nearest Event</li>
            @endif
            <li data-filter=".filter-app" @if(count($events) == 0) class="filter-active" @endif>Most Popular</li>
            <li data-filter=".filter-card">  Athens  </li>
            <li data-filter=".filter-web"> Thessaloniki </li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @if(count($events) != 0)
      @foreach (array_slice($events,0,9) as $event)

        <div class="col-lg-4 col-md-6 portfolio-item filter-near">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="img-fluid fillwidth" alt="">
              <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info" >
              <p style="font-size:12px;"><a href="{{ route('event.show', $event['id']) }}">@if(sizeof($event['performance'])>1)
                {{$event['performance'][0]['displayName']}} with {{$event['performance'][1]['displayName']}}
                  @if(sizeof($event['performance'])>2)
                  and {{$event['performance'][2]['displayName']}}
                  @endif
                @else
                {{$event['performance'][0]['displayName']}}
              @endif</a></p>
              <p>{{ date('F j, Y', strtotime($event['start']['date'])) }}</p>
              <p>{{ $event['location']['city'] }}</p>
            </div>
          </div>
        </div>
        @endforeach
        @endif
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach ($popularEvents as $event)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="img-fluid fillwidth" alt="">
              <a href="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="link-preview venobox" data-gall="portfolioGallery" title="Card 3"><i class="ion ion-eye"></i></a>
              <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info" >
              <p style="font-size:12px;"><a href="{{ route('event.show', $event['id']) }}">@if(sizeof($event['performance'])>1)
                {{$event['performance'][0]['displayName']}} with {{$event['performance'][1]['displayName']}}
                  @if(sizeof($event['performance'])>2)
                  and {{$event['performance'][2]['displayName']}}
                  @endif
                @else
                {{$event['performance'][0]['displayName']}}
              @endif</a></p>
              <p>{{ date('F j, Y', strtotime($event['start']['date'])) }}</p>
              <p>{{ $event['location']['city'] }}</p>
            </div>
          </div>
        </div>
        @endforeach
    </div>


    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach (array_slice($athensEvents,0,6) as $event)
        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="img-fluid fillwidth" alt="">
              <a href="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="link-preview venobox" data-gall="portfolioGallery" title="Card 3"><i class="ion ion-eye"></i></a>
              <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info" >
              <p style="font-size:12px;"><a href="{{ route('event.show', $event['id']) }}">@if(sizeof($event['performance'])>1)
                {{$event['performance'][0]['displayName']}} with {{$event['performance'][1]['displayName']}}
                  @if(sizeof($event['performance'])>2)
                  and {{$event['performance'][2]['displayName']}}
                  @endif
                @else
                {{$event['performance'][0]['displayName']}}
              @endif</a></p>
              <p>{{ date('F j, Y', strtotime($event['start']['date'])) }}</p>
              <p>{{ $event['location']['city'] }}</p>
            </div>
          </div>
        </div>
        @endforeach
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach (array_slice($thessalonikiEvents,0,6) as $event)
        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="img-fluid fillwidth" alt="">
              <a href="{{asset('https://images.sk-static.com/images/media/profile_images/artists/'.$event['performance'][0]['artist']['id'].'/huge_avatar')}}" class="link-preview venobox" data-gall="portfolioGallery" title="Card 3"><i class="ion ion-eye"></i></a>
              <a href="{{ route('event.show', $event['id']) }}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info" >
              <p style="font-size:12px;"><a href="{{ route('event.show', $event['id']) }}">@if(sizeof($event['performance'])>1)
                {{$event['performance'][0]['displayName']}} with {{$event['performance'][1]['displayName']}}
                  @if(sizeof($event['performance'])>2)
                  and {{$event['performance'][2]['displayName']}}
                  @endif
                @else
                {{$event['performance'][0]['displayName']}}
              @endif</a></p>
              <p>{{ date('F j, Y', strtotime($event['start']['date'])) }}</p>
              <p>{{ $event['location']['city'] }}</p>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    </section><!-- End Portfolio Section -->


@endsection
