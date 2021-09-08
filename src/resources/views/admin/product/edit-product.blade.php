@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Product Update')}}</h1>
<div class="row">
        <div class="col-md-6">
            <form action="{{route('product.update',$OBJ_Products->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">{{__('custom.Product Name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{$OBJ_Products->name}}" placeholder="{{__('custom.Product Name')}}">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCategory">{{__('custom.Category')}}</label>
                        <select name="category_id" class="form-control">
                            {!!checkCategoryProduct($OBJ_Products->category_id)!!}
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAmountOf">{{__('custom.Amount Of')}}</label>
                        <input type="number" class="form-control" name="amount_of" value="{{$OBJ_Products->amount_of}}" placeholder="{{__('custom.Amount Of')}}">
                        @error('amount_of')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPrice">{{__('custom.Price')}}</label>
                        <input type="number" class="form-control" name="price" value="{{$OBJ_Products->price}}" placeholder="{{__('custom.Price')}}">
                        @error('price')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                @foreach($OBJ_Images as $key => $OBJ_Image)
                <div>
                    <label for="inputImage">{{__('custom.Image')}} {{$key+1}}</label>
                    <input type="file" name="file_image[{{$key+1}}]" class="form-control">
                    <img src="{{secure_asset('/images/products')}}/{{$OBJ_Image->image}}" id="img_product_edit">
                </div>
                @endforeach
                <div class="form-group">
                    <label for="inputContent">{{__('custom.Content')}}</label>
                    <textarea name="content" id="content" value="{{$OBJ_Products->content}}" class="form-control" rows="3"></textarea>
                </div>
                <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
                <button type="submit" class="btn btn-primary">{{__('custom.Update')}} <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
@endsection