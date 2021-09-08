@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Add_tag')}}</h1>
<div class="row">
    <div class="col-md-6">
        <form action="{{route('tag.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="inputName">{{__('custom.Name_tag')}}</label>
                <input type="text" class="form-control" name="name" placeholder="{{__('custom.Name_tag')}}">
                @error('name')
                <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputStatus">{{__('custom.Status')}}</label>
                <select class="form-control" name="status">
                    <option value="1">{{__('custom.Show')}}</option>
                    <option value="0">{{__('custom.Hidden')}}</option>
                </select>
            </div>
            <a href="{{route('tag.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                {{__('custom.Exit')}}</a>
            <button type="submit" class="btn btn-primary">{{__('custom.Save')}} <i class="fa fa-save"></i></button>
        </form>
    </div>
</div>
@endsection