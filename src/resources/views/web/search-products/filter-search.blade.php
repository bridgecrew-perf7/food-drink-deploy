{{-- Filter --}}
<div class="brands_products">
  <h2>{{ __('custom.filter') }}</h2>
  <div class="brands-filter">
    <h5>{{ __('custom.by_category') }}</h5>
    <div class="custom-control">
      <form action="get">
        <input type="checkbox" class="custom-control-input" name="filterCategory" id="chkFoods" value="1"
          @if(isset($param['category']) && ($param['category'] == \App\Enums\CategoryTypes::FOOD || $param['category'] == 3)) checked @endif/>
        <label class="custom-control-label" for="chkFoods">{{ __('custom.food') }}</label>
      </form>
    </div>
    <div class="custom-control">
      <input type="checkbox" class="custom-control-input" name="filterCategory" id="chkDrinks" value="2"
        @if(isset($param['category']) && ($param['category'] == \App\Enums\CategoryTypes::DRINK || $param['category'] == 3)) checked @endif/>
      <label class="custom-control-label" for="chkDrinks">{{ __('custom.drink') }}</label>
    </div>
  </div>
  <div class="brands-filter">
    <h5>{{ __('custom.by_category') }}</h5>
    <select class="form-control margin-bottom-3" id="sltCategory">
      <option value="0">- - {{ __('custom.sort_alphabet') }} - -</option>
      <option value="1" @if(isset($param['sortCategory']) && ($param['sortCategory'] == \App\Enums\CategoryTypes::FOOD)) selected="selected" @endif>
        {{ __('custom.name_product') }}: {{ __('custom.a_to_z') }}
      </option>
      <option value="2" @if(isset($param['sortCategory']) && ($param['sortCategory'] == \App\Enums\CategoryTypes::DRINK)) selected="selected" @endif>
        {{ __('custom.name_product') }}: {{ __('custom.z_to_a') }}
      </option>
    </select>
    <h5>{{ __('custom.by_price') }}</h5>
    <div class="input-group margin-bottom-3">
      <div class="form-group">
        <select class="form-control" id="sltPrice">
          <option value="0">- - {{ __('custom.sort_price') }} - -</option>
          <option value="1" @if(isset($param['sortPrice']) && ($param['sortPrice'] == 1)) selected="selected" @endif>
            {{ __('custom.price') }}: {{ __('custom.low_to_high') }}
          </option>
          <option value="2" @if(isset($param['sortPrice']) && ($param['sortPrice'] == 2)) selected="selected" @endif>
            {{ __('custom.price') }}: {{ __('custom.high_to_low') }}
          </option>
        </select>
      </div>
      <input type="text" class="form-control" name="minPrice" id="minPrice"placeholder="{{ __('custom.min') }}"
             value="@if(!empty($param['minPrice'])){{ $param['minPrice'] }}@endif">
      <input type="text" class="form-control brands-filter-input" name="maxPrice" id="maxPrice" placeholder="{{ __('custom.max') }}"
             value="@if(!empty($param['maxPrice'])){{ $param['maxPrice'] }}@endif">
    </div>
    <h5>{{ __('custom.by_rating') }}</h5>
    @include('web.search-products.inc-rating')
    <button class="form-control btn btn-warning brands-filter-input" id="filterApply">{{ __('custom.apply') }}</button>
    <button class="form-control btn btn-danger" id="buttonClear">{{ __('custom.clear_all') }}</button>
  </div>
</div>
{{-- Image ads --}}
<div class="shipping text-center">
  <img src="{{secure_asset('/images/home/poster_drink.jpg')}}" alt="poster-drink" />
</div>
<div class="shipping text-center">
  <img src="{{secure_asset('/images/home/banner-shop-page.png')}}" alt="banner-shop-page" />
</div>
