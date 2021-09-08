@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Add category')}}</h1>
<div class="row">
        <div class="col-md-6">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="inputName">{{__('custom.Category Name')}}</label>
                    <input type="text" class="form-control" name="name" placeholder="{{__('custom.Category Name')}}">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputCategory">{{__('custom.Category group')}}</label>
                    <select class="form-control" name="category_types_id">
                        @foreach($OBJ_Category_Types as $OBJ_Category_Type)
                            <option value="{{$OBJ_Category_Type->id}}">{{$OBJ_Category_Type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputStatus">{{__('custom.Status')}}</label>
                    <select class="form-control" name="status">
                        <option value="1">{{__('custom.Show')}}</option>
                        <option value="0">{{__('custom.Hidden')}}</option>
                    </select>
                </div>
                <a href="{{route('category.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
                <button type="submit" class="btn btn-primary">{{__('custom.Save')}} <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
@endsection