@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Update category')}}</h1>
<div class="row">
        <div class="col-md-6">
            <form action="{{route('category.update',$getCategoryById->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">{{__('custom.Category Name')}}</label>
                    <input type="text" class="form-control" name="name" value="{{$getCategoryById->name}}" placeholder="{{__('custom.Category Name')}}">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputCategory">{{__('custom.Category group')}}</label>
                    <select class="form-control" name="category_types_id">
                        {!!checkCategoryTy($getCategoryById->category_types_id)!!}
                    </select>
                </div>
                <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
                <button type="submit" class="btn btn-primary">{{__('custom.Update')}} <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
@endsection