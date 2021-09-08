@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.add_product')}}</h1>
<div class="row">
    <div class="col-md-6">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">{{__('custom.Product Name')}}</label>
                    <input type="text" class="form-control" name="name" placeholder="{{__('custom.Product Name')}}">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCategory">{{__('custom.Category')}}</label>
                    <select name="category_id" class="form-control">
                        @foreach($OBJ_Categorys as $OBJ_Category)
                            <option value="{{$OBJ_Category->id}}">{{$OBJ_Category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAmountOf">{{__('custom.Amount Of')}}</label>
                    <input type="number" class="form-control" name="amount_of" placeholder="{{__('custom.Amount Of')}}">
                    @error('amount_of')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPrice">{{__('custom.Price')}}</label>
                    <input type="number" class="form-control" name="price" placeholder="{{__('custom.Price')}}">
                    @error('price')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div>
                <label for="inputImage">{{__('custom.Image')}} 1</label>
                <input type="file" name="file_image[]" class="form-control">
            </div>
            @error('file_image')
                <strong>{{ $message }}</strong>
            @enderror
            <div>
                <label for="inputImage">{{__('custom.Image')}} 2</label>
                <input type="file" name="file_image[]" class="form-control">
            </div>
            @error('file_image')
                <strong>{{ $message }}</strong>
            @enderror
            <div>
                <label for="inputImage">{{__('custom.Image')}} 3</label>
                <input type="file" name="file_image[]" class="form-control">
            </div>
            @error('file_image')
                <strong>{{ $message }}</strong>
            @enderror
            <div class="form-group">
                <label for="inputStatus">{{__('custom.Status')}}</label>
                <select name="status" class="form-control">
                    <option value="1">{{__('custom.Show')}}</option>
                    <option value="0">{{__('custom.Hidden')}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputContent">{{__('custom.Content')}}</label>
                <textarea name="content" id="content" class="form-control" rows="3"></textarea>
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
            <button type="submit" class="btn btn-primary">{{__('custom.Save')}} <i class="fa fa-save"></i></button>
        </form>
    </div>
</div>
@endsection