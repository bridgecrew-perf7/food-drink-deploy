<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">{{__('custom.login')}}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">{{__('custom.email')}}</label>
                            <input class="form-control py-4 @error('email') is-invalid @enderror" id="email"
                                name="email" type="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                placeholder="{{__('custom.enter_email')}}" placeholder="{{__('custom.enter_email')}}" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">{{__('custom.password')}}</label>
                            <input class="form-control py-4 @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password" id="password" type="password"
                                placeholder="{{__('custom.enter_password')}}" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember"
                                    id="rememberPasswordCheck" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="rememberPasswordCheck">{{__('custom.remember_password')}}</label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">
                                {{__('custom.forgot_password')}}
                            </a>
                            @endif
                            <button class="btn btn-primary" type="submit">{{__('custom.login')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>