@extends('layouts.web')
@section('content')
<div class="container">
    <div class="row" id="row1"></div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{__('custom.Reset Password')}}</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email">{{__('custom.email')}}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="{{__('custom.email')}}"
                                autocomplete="email">
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
                                placeholder="{{__('custom.password')}}" autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{__('custom.confirm_password')}}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="{{__('custom.confirm_password')}}"
                                autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <button type="submit" id="reset_link" class="btn btn-danger">{{__('custom.Reset Password')}}</button>
                        </div>
                    </form>
                    <p class="text_footer"> 
                        <a href="{{ url()->previous() }}">{{__('custom.back to previous page')}}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row" id="row3"></div>
</div>
@endsection