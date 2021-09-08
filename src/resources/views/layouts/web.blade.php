<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.web.head')
</head>
<body>
    <header id="header">
        @include('includes.web.header')
    </header>

    <div class="section" id="section">
      @yield('content')
    </div>

    <footer id="footer">
        @include('includes.web.footer')
    </footer>

    {{-- Message when add to cart --}}
    <div id="messageAddToCart">
      <a href="{{ route('cart') }}" id="messageAddToCart-tag_click">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        (<span id="cart-count-web">{{Cart::count()}}</span>)
        <span id="cart-message-add"></span>
      </a>
    </div>

    {{-- Loader --}}
    <div id="loading">
      <div id="loader"></div>
    </div>

    @include('includes.web.lib-js')
</body>
