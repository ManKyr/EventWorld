@extends('layouts.app')
@section('opengraph')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="EventWorld - Music Events all over the world" />
    <meta property="og:description" content="EventWorld - Music Events all over the world. Login for more features" />
    <meta property="og:image" content="{{ asset('assets/img/icon_opengraph.jpg')}}" />
@endsection
@section('title')
    Login | EventWorld
@endsection
@section('content')

<div class="container" style="padding-top:190px;padding-bottom:190px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">                
                <div class="card-body p-4">
                    <h1> <b> User Login</b></h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                                    <i class="fa fa-lock fa-fw"></i>
                                </span>
                            </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus placeholder="{{ __('Password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="input-group mb-4">
                            <div class="form-check checkbox">
                                <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                                <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
  

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success px-4">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link px-0 " style="color:green" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
