@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Update User')}}</h1>
<form action="{{route('user.update',$getUserById->id)}}" method="post">
    <div class="row">
        <div class="col-md-5">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputName">{{__('custom.username')}}</label>
                <input type="text" class="form-control" name="name" value="{{$getUserById->name}}" placeholder="{{__('custom.username')}}">
                @error('name')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPhoneNumber">{{__('custom.Phone Number')}}</label>
                <input type="number" class="form-control" name="phone" value="{{$getUserById->phone}}" placeholder="{{__('custom.Phone Number')}}">
                @error('phone')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputGender">{{__('custom.Gender')}}</label>
                <select name="gender" id="profile_gender" style="width:100%;height: 40px;border: 1px solid #ccc;">
                    {!!checkGenderUserEdit($getUserById->gender)!!}
                </select>
            </div>
            <div class="form-group">
                <label for="inputStatus">{{__('custom.Date Of Birth')}}</label>
                <input type="date" class="form-control" name="date_of_birth" value="{{$getUserById->date_of_birth}}">
                @error('date_of_birth') 
                    <strong>{{ $message }}</strong> 
                @enderror
            </div>
            <div class="form-group">
                <label for="inputContent">{{__('custom.Address')}}</label>
                <input type="text" class="form-control" name="address" value="{{$getUserById->address}}" placeholder="{{__('custom.Address')}}">
                @error('address') 
                    <strong>{{ $message }}</strong> 
                @enderror
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
            <button type="submit" class="btn btn-primary">{{__('custom.Save')}} <i class="fa fa-save"></i></button>
        </div>
        <div class="col-md-5" id="div_image">
            <div class="image_avatar_profile" id="holder">
                {!!checkImageUserEdit($getUserById->image)!!}
            </div>
            <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{$getUserById->image}}">
            <h5 class="mb-3"><button  id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-danger">{{__('custom.Choose')}}</button></h5>
            <p>{{__('custom.Maximum file size')}}</p>
            <p>{{__('custom.Format')}}</p>
        </div>
    </div>
</form>
@endsection 