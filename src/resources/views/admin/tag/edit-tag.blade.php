@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Update_tag')}}</h1>
<div class="row">
        <div class="col-md-6">
            <form action="{{route('tag.update',$OBJ_Tag_edit->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">{{__('custom.Name_tag')}}</label>
                    <input type="text" class="form-control" name="name" value="{{$OBJ_Tag_edit->name}}" placeholder="{{__('custom.Name_tag')}}">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <a href="{{ route('tag.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
                <button type="submit" class="btn btn-primary">{{__('custom.Update')}} <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
@endsection