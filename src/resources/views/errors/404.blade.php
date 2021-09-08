<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food and Drinks</title>
    @include('includes.web.head')
    <link rel="stylesheet" href="{{secure_asset('css/web/not-found.css') }}">
</head>
<body>
    <div class="container text-center">
        <div class="logo-404">
            <a href="{{ route('index') }}">
                <img src="{{secure_asset('images/logo_food_and_drinks.png')}}" alt="logo" />
            </a>
        </div>
        <div class="content-404">
            <img src="{{secure_asset('images/404.png')}}" id="content-404-image" class="img-responsive" alt="404" />
            <h1>{{ __('custom.404-title') }}</h1>
            <p>{{ $exception->getMessage() }}</p>
            <h3><a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i> {{ __('custom.404-back-home') }}</a></h3>
        </div>
    </div>
</body>
</html>
