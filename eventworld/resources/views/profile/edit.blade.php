@extends('layouts.app')
@section('title')
    ΕventWorld | User Edit Profile
@endsection
@section('content')  
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container"style="padding-top:190px;padding-bottom:190px;">
<div class="row flex-lg-nowrap">
    <form class="w-100" method="POST" action="/profile" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="col">
    <div class="row">
      <div class="col mb-3">
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
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>FirstName</label>
                              <input class="form-control" type="text" name="firstname" placeholder="FirstName" value="{{ $user->firstname }}">
                              @error('firstname')
                                <div class="text-danger">{{  $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>LastName</label>
                              <input class="form-control" type="text" name="lastname" placeholder="LastName" value="{{ $user->lastname }}">
                              @error('lastname')
                                <div class="text-danger">{{  $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>                      
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>City</label>
                              <input class="form-control" type="text" name="city" placeholder="Your City" value="{{ $user->city }}">
                            </div>
                          </div>
                        </div>               
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input class="form-control" type="number" name="phone" placeholder="Your Phone Number" value="{{ $user->phone }}">
                            </div>
                          </div>
                        </div>                       
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name="email" placeholder="user@example.com"value="{{ $user->email }}">
                              @error('email')
                                <div class="text-danger">{{  $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-success" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </form>
  </div>
</div>
</div>
@endsection