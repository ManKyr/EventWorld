@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="Eventworld - Music Events all over the world" />
    <meta property="og:description" content="Eventworld - Music Events all over the world. User profile." />
    <meta property="og:image" content="assets/img/users/{{$user->profile_image}}"/> 
@endsection
@section('title')
    ΕventWorld | User Profile
@endsection
@section('content')  
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container"style="padding-top:190px;padding-bottom:190px;">
<div class="row flex-lg-nowrap">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded " style="height: 140px; width:140px; @if($user->profile_image) background-image:url(/assets/img/users/{{ $user->profile_image}}) !important; background-size:cover; background-position:center; @else background-color: rgb(233, 236, 239); @endif">
                      @if(!$user->profile_image) 
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">No Image</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->firstname }} {{ $user->lastname }}</h4>
                    
                    <div class="mt-2">
                      <input type="file" class="d-none change-upload-image">
                      <button onclick="document.querySelector('.change-upload-image').click()" class="btn btn-success" type="button">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button>
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    @auth
                    @if(auth()->check())
                      @if(auth()->user()->isAdmin())
                      <span class="badge badge-pill badge-success">Administrator</span>
                      @else
                      <span class="badge badge-pill badge-success">User</span>
                      @endif
                    @endif
                  @endauth
                    
                    <div class="text-muted"><small>{{ date('d M y', strtotime($user->created_at)) }}</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">User Info</a></li>
              </ul>
              <div class="tab-content pt-3" >
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>FirstName</label>
                              <input class="form-control" type="text" name="firstname" placeholder="FirstName" value="{{ $user->firstname }}"readonly>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>LastName</label>
                              <input class="form-control" type="text" name="lastname" placeholder="LastName" value="{{ $user->lastname }}"readonly>
                            </div>
                          </div>
                        </div>                        
                        @if(!empty($user->city))
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>City</label>
                              <input class="form-control" type="text" name="city" placeholder="Your City" value="{{ $user->city }}"readonly>
                            </div>
                          </div>
                        </div>
                        @endif
                        @if(!empty($user->phone))
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input class="form-control" type="number" name="phone" placeholder="Your Phone Number" value="{{ $user->phone }}"readonly>
                            </div>
                          </div>
                        </div>
                        @endif                        
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name="email" placeholder="user@example.com"value="{{ $user->email }}"readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a class="btn btn-success" href="{{ route('profile.password') }}">Change Password</a>
                      <a class="btn btn-success" href="{{ route('profile.edit') }}">Change Informations</a>
                    </div>
                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary" >
                <i class="fa fa-sign-out"></i>
                <a style="color:white;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </button>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">You need help? Get fast, free help from our friendly assistants.</p>
            <a class="btn btn-success"  href="{{ Request::path() === '/' ? '#contact' : '/#contact'}}">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection


@section('scripts')


<script>
  $(document).ready(function(){
      $(".change-upload-image").on('change' , function(){
         let file = $(this)[0].files[0];
          let data = new FormData();
          data.append('image' , file);
          data.append('_token' , "{{  csrf_token() }}");

          $.ajax({
              url: '/profile/photo',
              method:'POST',
              data,
              processData: false,  // tell jQuery not to process the data
       contentType: false,
              success : function(response) {
                  window.location.reload();
              },
              error: function(response) {
                console.log(response)
              }
          });

      });
  });
</script>

@endsection