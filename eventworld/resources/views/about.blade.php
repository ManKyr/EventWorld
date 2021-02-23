@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="Eventworld - Music Events all over the world" />
    <meta property="og:description" content="Eventworld - About Us." />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}"/> 
@endsection
@section('title')
    About Us | ΕventWorld 
@endsection
@section('content')
     <!-- ======= About Us Section ======= -->
     <section id="about" style="padding-top:190px;padding-bottom:190px;">
        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h3>About Us</h3>
            <p>EventWorld is an online cultural events calendar that focuses on what's on around Greece.
                EventWorld started as an online cultural events calendar that focuses on what's on around Greece because of a lesson in Internation Hellenic University.
                That's why we try to inform people around Greece about the music event will coming up.
                Along the way, with the help of songkick we made a website that help everyone to find music event close to him.
                We want to be the best music event informer site in Greece.<br><br>
                When you log in events are organised into the categories 'Nearest Event', 'Most Popular', 'Athens' and 'Thessaloniki' to help you find what you're looking for.</p>
          </header>
  
          <div class="row about-cols">
  
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="about-col">
                <div class="img">
                  <img src="assets/img/mission.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                </div>
                <h2 class="title"><a href="#">Our Mission</a></h2>
                <p>
                    EventWorld is a home for live music in Greece. From day one, we try about making it as easy, fun and fair as possible for you to see your favorite artists live.</p>
              </div>
            </div>
  
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="about-col">
                <div class="img">
                  <img src="assets/img/plan.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="ion-ios-list-outline"></i></div>
                </div>
                <h2 class="title"><a href="#">Our Plan</a></h2>
                <p>
                    Live music should work for everyone, and we work hard to empower our website to help you find easily what you looking for.
                </p>
              </div>
            </div>
  
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="about-col">
                <div class="img">
                  <img src="assets/img/vision.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="ion-ios-eye-outline"></i></div>
                </div>
                <h2 class="title"><a href="#">Our Vision</a></h2>
                <p>
                    EventWorld is totally free. Sign up and track bands via our website. Our work is to make you the first that will know about the best music shows in your area.
                </p>
              </div>
            </div>
  
          </div>
        </div>
      </section><!-- End About Us Section -->
  
@endsection