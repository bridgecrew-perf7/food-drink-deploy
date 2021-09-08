@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.User detail')}}: {{$getUserById->name}}</h1>
<div class="card mb-4">
    <div class="row card-body">
        <div class="col-md-5" id="col_left">
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.ID User')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$getUserById->id}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.username')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$getUserById->name}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.email')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$getUserById->email}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.Phone Number')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$getUserById->phone}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.Gender')}}</label>
                    </div>
                    <div class="col-md-6">
                        @if($getUserById->gender == 1)
                        <p>{{__('custom.Male')}}</p>
                        @else
                        <p>{{__('custom.Female')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.Date Of Birth')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$getUserById->date_of_birth}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.Address')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$getUserById->address}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.Status')}}</label>
                    </div>
                    <div class="col-md-6">
                        {!!checkStatusUser($getUserById->status)!!}
                    </div>
                </div>
            </div>
            <div class="form-group" id="form_group_user">
                <div class="row">
                    <div class="col-md-6">
                        <label id="label_user">{{__('custom.Operation start date')}}</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$getUserById->created_at}}</p>
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
        </div>
        <div class="col-md-5" id="div_image">
            <div class="image_avatar_profile" id="holder">
                {!!checkImageUserEdit($getUserById->image)!!}
            </div>
            <label id="label_user">{{__('custom.Avatar')}}</label>
        </div>
    </div>
</div>
@endsection 