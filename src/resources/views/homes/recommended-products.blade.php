<div class="recommended_items">
  <h2 class="title text-center">{{ __('custom.recommended_products') }}</h2>
  <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @forelse($recommend_products as $products)
      <div class="item @if($loop->index === 0) active @endif">
        @foreach($products as $row)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="product-info text-center">
                <a href="{{ route('product_detail', ['slug' => $row->slug]) }}">
                  <img src="/images/products/{{ $row->images->first()->image }}" alt="{{ $row->images->first()->image }}"/>
                </a>
                <h2>{{ formatPrice($row->price) }}</h2>
                <p><a href="{{ route('product_detail', ['slug' => $row->slug]) }}">{{ $row->name }}</a></p>
                <a href="javascript:void(0);" id="recommend-btn-cart" class="btn btn-default add-to-cart add_to_cart-hover"
                   onclick="addToCart({!!$row->id!!},1,'add')">
                  <i class="fa fa-shopping-cart"></i> {{ __('custom.add_to_cart') }}
                </a>
              </div>
              {!! getNewProduct($row->created_at) !!}
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @empty
      <span>{{ __('custom.no_data') }}</span>
      @endforelse
    </div>
    @if(!empty($recommend_products))
      <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
    @endif
  </div>
</div>
