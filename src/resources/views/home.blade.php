@extends('layouts.web')
@section('content')
  @include('homes.slide')
  {{-- Content --}}
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            @include('homes.left-sidebar')
          </div>
        </div>
        <div class="col-sm-9 padding-right">
          {{-- Latest Products --}}
          <div class="features_items">
            <h2 class="title text-center">{{ __('custom.latest_products') }}</h2>
            @forelse($latest_products as $row)
              <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="product-info text-center">
                      <img src="/images/products/{{ $row->images->first()->image }}" alt="" />
                      <h2>{{ formatPrice($row->price) }}</h2>
                      <p>{!! getRatingProduct($row->id)  !!}</p>
                      <p>{{ $row->name }}</p>
                      <a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="addToCart({!!$row->id!!},1,'add')">
                        <i class="fa fa-shopping-cart"></i>{{ __('custom.add_to_cart') }}
                      </a>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>{{ formatPrice($row->price) }}</h2>
                        <p>{!! getRatingProduct($row->id)  !!}</p>
                        <p><a href="{{ route('product_detail', ['slug' => $row->slug]) }}">{{ $row->name }}</a></p>
                        <a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="addToCart({!!$row->id!!},1,'add')">
                          <i class="fa fa-shopping-cart"></i>{{ __('custom.add_to_cart') }}
                        </a>
                      </div>
                    </div>
                    {!! getNewProduct($row->created_at) !!}
                  </div>
                </div>
              </div>
            @empty
              <span>{{ __('custom.no_data') }}</span>
            @endforelse
          </div>
          {{-- Recommended Products --}}
          @include('homes.recommended-products')
        </div>
      </div>
    </div>
  </section>
@stop
