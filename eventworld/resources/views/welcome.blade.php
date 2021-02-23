@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="Eventworld - Music Events all over the world" />
    <meta property="og:description" content="Eventworld - Music Events all over the world - Welcome Page." />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}"/>
@endsection
@section('title')
    Home | ΕventWorld
@endsection
@section('content')
<section id="intro">
  <div class="intro-container">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url(assets/img/intro-carousel/front_image1.WEBP)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Live Music Events</h2>
              <p class="animate__animated animate__fadeInUp">You can have access to the biggest live music database in the world: over 6 million upcoming and past concerts from SongCick.</p>
              <a href="login" class="btn-get-started scrollto animate__animated animate__fadeInUp">
                @auth
                    @if(auth()->check())
                      @if(auth()->user())
                        Find an Event
                      @endif
                    @endif
                  @endauth
                  @guest
                    Login to find
                  @endguest
              </a>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/front_image2.WEBP)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Music Events all over the World</h2>
              <p class="animate__animated animate__fadeInUp">Find upcoming events for a metro area. A metro area is a city or a collection of the biggest cities all over the world.</p>
              <a href="login" class="btn-get-started scrollto animate__animated animate__fadeInUp">
                @auth
                  @if(auth()->check())
                    @if(auth()->user())
                      Find an Event
                    @endif
                  @endif
                @endauth
                @guest
                  Login to find
                @endguest
              </a>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/front_image3.WEBP)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">All of your Favorite Artists & Bands</h2>
              <p class="animate__animated animate__fadeInUp">Find upcoming events of your favorite artist or Band.</p>
              <a href="login" class="btn-get-started scrollto animate__animated animate__fadeInUp">
                @auth
                    @if(auth()->check())
                      @if(auth()->user())
                        Find an Event
                      @endif
                    @endif
                  @endauth
                  @guest
                    Login to find
                  @endguest
              </a>
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>
</section><!-- End Intro Section -->

<main id="main">

  <!-- ======= Featured Services Section Section ======= -->
  <section id="featured-services">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 box">
          <i class="ion-ios-bookmarks-outline"></i>
          <h4 class="title"><a href="">Eventwall</a></h4>
          <p class="description">Make and agenda with your favorite music events and add them in calendar</p>
        </div>

        <div class="col-lg-4 box box-bg">
          <i class="ion-ios-stopwatch-outline"></i>
          <h4 class="title"><a href="">Timeline of Events</a></h4>
          <p class="description">You can see the start date  of your music events</p>
        </div>

        <div class="col-lg-4 box">
          <i class="ion-ios-heart-outline"></i>
          <h4 class="title"><a href="">Your favorites</a></h4>
          <p class="description">Search and see the upcoming events of your favorite band</p>
        </div>

      </div>
    </div>
  </section><!-- End Featured Services Section -->

   <!-- ======= Popular Upcoming Events Section ======= -->
   <section id="portfolio" class="section-bg">
    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h3 class="section-title">Popular Upcoming Events</h3>
      </header>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
    <div class=" col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">Most Pupular Event In Greece</li>
        </ul>
      </div>
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
              <p>{{ $event['start']['date'] }}</p>
              <p>{{ $event['location']['city'] }}</p>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    </div>
  </section><!-- End Portfolio Section -->



  <!-- ======= Services Section ======= -->
  <section id="services">
    <div class="container" data-aos="fade-up">

      <header class="section-header wow fadeInUp">
        <h3>Services</h3>
        <p>EventWorld is an online cultural events calendar that focuses on what's on around Greece and all over the world. EventWorld started as an online cultural events calendar that focuses on what's on around Greece because of a lesson in International Hellenic University. EventWorld provides some comprehensive and quality services to the visitor, some of which are as follows:</p>
      </header>

      <div class="row">

        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
          <div class="icon"><i class="ion-ios-navigate-outline"></i></div>
          <h4 class="title"><a href="">Near Event</a></h4>
          <p class="description">See which upcoming events is near to you.</p>
        </div>
        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
          <div class="icon"><i class="icon ion-android-globe"></i></div>
          <h4 class="title"><a href="">Find Event</a></h4>
          <p class="description">Find an event everywhere in Greece.</p>
        </div>
        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
          <div class="icon"><i class="ion-ios-calendar-outline"></i></div>
          <h4 class="title"><a href="">Organize Everything</a></h4>
          <p class="description">Insert your upcoming events in Google Calendar to don not miss anything.</p>
        </div>
        <!--<div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
          <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
          <h4 class="title"><a href="">Magni Dolores</a></h4>
          <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        </div>
        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
          <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
          <h4 class="title"><a href="">Nemo Enim</a></h4>
          <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
        </div>
        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="400">
          <div class="icon"><i class="ion-ios-people-outline"></i></div>
          <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
          <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
        </div>-->

      </div>

    </div>
  </section><!-- End Services Section -->


  <!-- ======= Facts Section ======= -->
  <!--<section id="facts">
    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h3>Facts</h3>
        <p>Some facts and numbers from our database of Events</p>
      </header>

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">274</span>
          <p>Clients</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">421</span>
          <p>Projects</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">1,364</span>
          <p>Hours Of Support</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">18</span>
          <p>Hard Workers</p>
        </div>

      </div>

      <div class="facts-img">
        <img src="assets/img/facts-img.png" alt="" class="img-fluid">
      </div>

    </div>-->
  </section><!-- End Facts Section -->

  <!-- ======= Team Section ======= -->
  <section id="team">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h3>Team</h3>
        <p>EventWorld consists of a small, flexible team but quite well known in programming projects mainly on web applications.</p>
      </div>

      <div class="row center">

        <div class="col-lg-4 col-md-4">
          <div class="member" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/team-kyros.WEBP" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Kyros George</h4>
                <span>Front-End Developer</span>
                <div class="social">
                  <a href="https://www.facebook.com/giorgos.kyrou.3"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.linkedin.com/in/giorgos-kyros/"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/team-manolas.WEBP" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Manolas Ioannis</h4>
                <span>Back-End Developer</span>
                <div class="social">
                  <a href="https://www.facebook.com/profile.php?id=100006812591254"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.linkedin.com/in/imanolas/"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h3>Contact Us</h3>
        <p>Dont Hesitate to Contact at anytime with our team </p>
      </div>

      <div class="row contact-info">

        <div class="col-md-4">
          <div class="contact-address">
            <i class="ion-ios-location-outline"></i>
            <h3>Address</h3>
            <address>Egnatias, 232 <br>Thessaloniki, SKG 54248, Greece</address>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-phone">
            <i class="ion-ios-telephone-outline"></i>
            <h3>Phone Number</h3>
            <p><a href="tel:+306999999999">+30 699 999 9999</a></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-email">
            <i class="ion-ios-email-outline"></i>
            <h3>Email</h3>
            <p><a href="mailto:ev3ntworld@gmail.com">ev3ntworld@gmail.com</a></p>
          </div>
        </div>

      </div>

      <div class="form">
        <form  class="custom-contact-form">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="form-group col-md-6">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="text-center"><button class="btn btn-success btn-block" type="submit">Send Message</button></div>

          <div class="mt-4 email-success alert alert-success d-none">

          </div>

          <div class="mt-4 email-error alert alert-danger d-none">

          </div>

        </form>
      </div>

    </div>
  </section><!-- End Contact Section -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


@endsection

@section('scripts')
    <script>
        //Gia na apofigoume double submit
        let contactSubmiting = false;
        $(".custom-contact-form").on('submit', function(e){
          e.preventDefault();
          let data = $(this).serialize();
          if(!$('.email-error').hasClass(''))
          $('.email-error').addClass('d-none');
          if(!$('.email-success').hasClass(''))
          $('.email-success').addClass('d-none');
          if(contactSubmiting) {
            return;
          }
          contactSubmiting = true;
          $.ajax({
            url:'/forms/contact',
            method:'POST',
            data,
            success: function(resp) {
              $('.email-success').text('EMail has been sent successfully.').removeClass('d-none').hide().fadeIn(500);
            },
            error: function(resp){
              console.log(resp)
              if(resp.status == 422){
                for(let key in  resp.responseJSON.errors) {
                  
                  $('.email-error').text(resp.responseJSON.errors[key]).removeClass('d-none').hide().fadeIn(500);
                  break;
                }
              }
              
            },
            complete:function(){
              contactSubmiting = false;
            }
          });
        });
    </script>
@endsection