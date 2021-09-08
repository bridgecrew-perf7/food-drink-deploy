@extends('layouts.web')
@section('content')
    <div class="container lst">
        @if(session('message'))
            <div id="message_time" class="alert {{ session('alert') }} fw-bold text-center mb-3">
                <h3>{{ session('message') }}</h3>
            </div>
        @endif
        <h3 class="well">{{__('custom.suggest_title')}}</h3>
        <form action="{{ route('suggest.store') }}" id="suggestForm" enctype="multipart/form-data" method="post">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h5>{{ $error }}</h5>
                    @endforeach
                </div>
            @endif
            @csrf
            <small class="text-danger"></small>
            <div class="row form-group">
                <div class="col-lg-3">
                    <label>{{ __('custom.category') }}:&ensp;</label>
                    <input type="radio" name="categoryType" id="rdoFood" value="food" checked>
                    <label for="rdoFood">&nbsp;{{ __('custom.food') }}&ensp;</label>
                    <input type="radio" name="categoryType" id="rdoDrink" value="drink">
                    <label for="rdoDrink">&nbsp;{{ __('custom.drink') }}</label>
                </div>
                <div class="col-lg-3">
                    <select name="category_id" id="categoryFood" class="form-control">
                        <option value="">- - {{__('custom.category') . ' ' . __('custom.food')}} - -</option>
                        @foreach(getCategoriesByType(\App\Enums\CategoryTypes::FOOD) as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    <select name="category_id" id="categoryDrink" class="form-control">
                        <option value="">- - {{__('custom.category') . ' ' . __('custom.drink')}} - -</option>
                        @foreach(getCategoriesByType(\App\Enums\CategoryTypes::DRINK) as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>{{ __('custom.product') }}:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                       placeholder="{{__('custom.product')}}">
            </div>
            <div class="row form-group">
                <div class="col-lg-6">
                    <label>{{ __('custom.price') }}:</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}"
                           placeholder="{{__('custom.price')}}">
                </div>
                <div class="col-lg-6">
                    <label>{{ __('custom.quantity') }}:</label>
                    <input type="number" class="form-control" name="amount_of" id="amount_of"
                           value="{{ old('amount_of') }}"
                           placeholder="{{__('custom.quantity')}}">
                </div>
            </div>
            <div class="form-group">
                <label>{{ __('custom.images') }}:</label>
                <div class="gallery-photo"></div>
                <div class="form-group">
                  <label for="gallery-photo-add" class="suggest-img-button btn btn-default">
                    <i class="fa fa-upload" aria-hidden="true"></i> {{__('custom.choose_photo')}}
                  </label>
                  <input type="file" multiple class="" name="images[]" id="gallery-photo-add"
                         accept=".png, .jpg, .jpeg">
                </div>
                <p class="text-muted">{{ __('custom.message_file_length') }}</p>
            </div>
            <div class="form-group">
                <label>{{ __('custom.content') }}:</label>
                <textarea class="form-control" name="content" id="content"
                          aria-hidden="true">{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">{{__('custom.btn_send_request')}}</button>
            </div>
        </form>
    </div>
    @include('web.products.suggest-js')
@stop
