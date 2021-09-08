@extends('layouts.web')
@section('content')
<div class="container">
    <div class="row" id="row1"></div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{__('custom.login')}}</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{__('custom.email')}}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="{{__('custom.email')}}"
                                autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{__('custom.password')}}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="{{__('custom.password')}}" autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button id="login" type="submit" class="btn btn-danger">{{__('custom.login')}}</button>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('custom.remember_password') }}
                                </label>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('password.request') }}">{{__('custom.forgot_password')}}</a>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('/redirect/facebook') }}" id ="btn" class="btn btn-primary"><i class="fa fa-facebook"aria-hidden="true"></i> Facebook</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ url('/redirect/google') }}" id="btn" class="btn btn-danger"><i class="fa fa-google-plus"></i> Google</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ url('/redirect/twitter') }}" id="btn" class="btn btn-primary"><i class="fa fa-twitter"aria-hidden="true"></i> Twitter</a>
                            </div>
                        </div>
                    </div>
                    <p class="text_footer">{{__('custom.Do not have an account')}} 
                        <a href="{{route('register')}}">{{__('custom.register')}}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row" id="row3"></div>
</div>
@endsection