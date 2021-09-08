@extends('layouts.web')
@section('content')
{{-- Content --}}
<section>
  <div class="container">
    <div class="row">
      @if(session('message'))
        <div id="message_time" class="alert {{ session('alert') }} fw-bold text-center mb-3">
          <h5>{{ session('message') }}</h5>
        </div>
      @endif
      <div class="col-sm-3">
        <div class="left-sidebar">
          @include('homes.left-sidebar')
        </div>
      </div>
      <div class="col-sm-9 padding-right">
        <div class="features_items">
          <div class="product-details">
            <div class="col-sm-5">
              <div class="view-product">
                <img id="pd-image-large" src="/images/products/{{ $product->images->first()->image }}"
                     alt="{{ $product->images->first()->image }}" />
              </div>
              <div id="similar-product" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  @forelse($arr_images as $images)
                    <div class="item @if($loop->index === 0) active @endif">
                      @foreach($images as $row)
                        <a href="javascript:void(0)">
                          <img id="pd-image-small" src="/images/products/{{ $row->image }}" alt="{{ $row->image }}">
                        </a>
                      @endforeach
                    </div>
                  @endforeach
                </div>
                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information">
                <h2>{{ $product->name }}</h2>
                @if(Auth::check() && Auth::user()->isAdmin())
                  <p>ID {{ __('custom.product') }}: {{ $product->id }}</p>
                @endif
                <span>
                  <span>{{ formatPrice($product->price) }}</span>
                  @if($product->amount_of > 0)
                    <label>{{ __('custom.quantity') }}:</label>
                    <input type="text" value="1" id="product-detail-quantity-get" />
                    <button type="button" class="btn btn-fefault cart" onclick="addToCart({!!$product->id!!},2,'add')">
                      {{ __('custom.add_to_cart') }}
                    </button>
                  @endif
                </span>
                <p>
                    <b>{{ __('custom.quantity') }}:</b>
                    <span id="product-detail-quantity-value">{{ $product->amount_of }}</span>
                </p>
                <p>
                  <b>{{ __('custom.rating') }}:</b>
                  {!! getRatingProduct($product->id)  !!}
                </p>
                <p><b>{{ __('custom.type') }}:</b> {{ $product->categories->category_type->name }}</p>
                <p><b>{{ __('custom.category') }}:</b> {{ $product->categories->name }}</p>
                <div class="socials-share">
                  <a class="bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"
                     target="_blank"><span class="fa fa-facebook"></span> Facebook</a>
                  <a class="bg-twitter" href="https://twitter.com/share?text={{$product->name}}&url={{Request::url()}}"
                     target="_blank"><span class="fa fa-twitter"></span> Tweet</a>
                  <a class="bg-pinterest" href="https://www.pinterest.com/pin/create/button/?url={{Request::url()}}"
                     target="_blank"><span class="fa fa-pinterest"></span> Pinterest</a>
                  <a class="bg-email" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to&su={{$product->name}}&body={{$product->content}}"
                     target="_blank"><span class="fa fa-envelope"></span> Gmail</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Tabs Details and Reviews -->
          <div class="category-tab shop-details-tab">
            @include('web.products.inc-review')
          </div>
          <!-- Recommended Products -->
          @include('homes.recommended-products')
        </div>
      </div>
    </div>
  </div>
</section>
@include('web.products.js-product-detail')
@stop
