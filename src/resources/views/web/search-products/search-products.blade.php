@extends('layouts.web')
@section('content')
  {{-- Content --}}
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            @include('web.search-products.filter-search')
          </div>
        </div>
        <div class="col-sm-9 padding-right">
          <div class="features_items">
            <h2 class="title text-center">{{ __('custom.search_products') }}</h2>
            <div class="form-group result-search">
              <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
              {{ __('custom.result_search') }}
              '<span>@if(!empty(request('slug'))){!! request('slug') !!}@else{!! request('keyword') !!}@endif</span>'
            </div>
            <div id="ajaxData">
              @forelse($products as $row)
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="product-info text-center">
                        <img src="/images/products/{{$row->images->first()->image}}" alt="" />
                        <h2>{{ formatPrice($row->price) }}</h2>
                        <p>{{ $row->name }}</p>
                        <p>{!! getRatingProduct($row->id)  !!}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ __('custom.add_to_cart') }}</a>
                      </div>
                      <div class="product-overlay">
                        <div class="overlay-content">
                          <h2>{{ formatPrice($row->price) }}</h2>
                          <p><a href="{{ route('product_detail', ['slug' => $row->slug]) }}">{{ $row->name }}</a></p>
                          <p>{!! getRatingProduct($row->id)  !!}</p>
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
              <p class="row">{!! $products->appends($param)->links('pagination::bootstrap-4') !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('web.search-products.ajax-search')
@stop
