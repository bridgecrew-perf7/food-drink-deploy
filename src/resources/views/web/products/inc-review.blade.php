<div class="col-sm-12">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#details" data-toggle="tab">{{ __('custom.details') }}</a></li>
    <li>
      <a href="#reviews" data-toggle="tab">
        {{ __('custom.reviews') }} ({{$product->evaluates->count()}})
      </a>
    </li>
  </ul>
</div>
<div class="tab-content">
  <div class="tab-pane fade active in" id="details">
    <div class="col-sm-12">
      <span>{!! $product->content !!}</span>
    </div>
  </div>
  <div class="tab-pane fade" id="reviews">
    <div class="col-sm-12">
      @forelse ($reviews as $row)
        <ul>
          <li><a href="javascript:void(0)"><i class="fa fa-user"></i> {{ $row->users->name }}</a></li>
          <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i> {{ $row->created_at->format('H:i') }} </a></li>
          <li><a href="javascript:void(0)"><i class="fa fa-calendar-o"></i>{{ $row->created_at->format('d/m/Y') }}</a></li>
          <li><a href="javascript:void(0)">
              <i class="fa fa-star click-active" aria-hidden="true"></i>
              {{ $row->rating }}
            </a></li>
        </ul>
        <p>{{ $row->review }}</p>
        <hr/>
      @empty
        <p>{{ __('custom.message_rating_no_data') }}</p>
      @endforelse
      {!! $reviews->links('pagination::bootstrap-4') !!}
      @if(Auth::user())
        <p><b>{{ __('custom.write_review') }}</b></p>
        <form action="{{ route('rating') }}" id="formStartRating" method="POST">
          @csrf
          <textarea name="review" id="review" placeholder="{{ __('custom.reviews') }}"></textarea>
          <input type="hidden" value="0" name="rating" id="valueStar"/>
          <input type="hidden" value="{{ $product->id }}" name="product_id"/>
          <b>Rating: </b>
          {!! displayStar() !!}
          <button type="submit" class="btn btn-default pull-right">{{ __('custom.btn_post') }}</button>
        </form>
      @else
        <i>{{__('custom.product_detail_review')}}</i>
      @endif
    </div>
  </div>
</div>
