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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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
                            <button id="reset_link" type="submit" class="btn btn-danger">{{__('custom.Send Password Reset Link')}}</button>
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