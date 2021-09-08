<div class="input-group brands-filter-rating">
  <a id="filterRating5" @if(isset($param['rating']) && $param['rating'] == 5)class="click-active"@endif>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
  </a>
  <a id="filterRating4" @if(isset($param['rating']) && $param['rating'] == 4)class="click-active"@endif>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    {{ __('custom.and_up') }}
  </a>
  <a id="filterRating3" @if(isset($param['rating']) && $param['rating'] == 3)class="click-active"@endif>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    {{ __('custom.and_up') }}
  </a>
  <a id="filterRating2" @if(isset($param['rating']) && $param['rating'] == 2)class="click-active"@endif>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    {{ __('custom.and_up') }}
  </a>
  <a id="filterRating1" @if(isset($param['rating']) && $param['rating'] == 1)class="click-active"@endif>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    {{ __('custom.and_up') }}
  </a>
</div>
