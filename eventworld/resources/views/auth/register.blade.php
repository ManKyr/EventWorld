@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="EventWorld - Music Events all over the world" />
    <meta property="og:description" content="EventWorld - Music Events all over the world. Sign up for more features" />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}" />
@endsection
@section('title')
    Register | EventWorld
@endsection
@section('content')
<div class="container" style="padding-top:190px;padding-bottom:190px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">                
                <div class="card-body p-4">
                    <h1> <b> User Registration</b></h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user fa-fw"></i>
                                </span>
                            </div>
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="{{ __('Firstname') }}" >
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user fa-fw"></i>
                                </span>
                            </div>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="{{ __('Lastname') }}">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-building fa-fw"></i>
                                </span>
                            </div>
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="{{ __('City') }}" autofocus>

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope fa-fw"></i>
                                </span>
                            </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('Email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-phone fa-fw"></i>
                                </span>
                            </div>
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone Number') }}" autofocus>

                            
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock fa-fw"></i>
                                </span>
                            </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus placeholder="{{ __('Password') }}" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock fa-fw"></i>
                                </span>
                            </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus placeholder="{{ __('Password Confirmation') }}">
                            
                        </div>

                        
                                <button type="submit" class="btn btn-block btn-success mt-1">
                                    {{ __('Register') }}
                                </button>
                            
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
