@extends('layouts.web')
@section('content')
    @if (Cart::count() > 0)
        <section id="cart_items">
            @include('web.carts.items')
        </section>
        <section id="do_action">
            @include('web.carts.order-products')
        </section>
    @else
        <div class="container">
            <div class="alert text-center" role="alert">
                <h3>{{ __('custom.order_error_not_item') }}</h3>
            </div>
        </div>
    @endif
@stop
