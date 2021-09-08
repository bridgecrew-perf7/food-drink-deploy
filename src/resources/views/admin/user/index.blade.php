@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.list_users')}}</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>{{__('custom.list_users')}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('custom.Number In Order')}}</th>
                        <th>{{__('custom.ID User')}}</th>
                        <th>{{__('custom.User Name')}}</th>
                        <th>{{__('custom.Image')}}</th>
                        <th>{{__('custom.Status')}}</th>
                        <th>{{__('custom.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($OBJ_Users as $OBJ_User)
                        <tr>    
                            <td>{{$loop->iteration}}</td>
                            <td>{{$OBJ_User->id}}</td>
                            <td>{{$OBJ_User->name}}</td>
                            <td>
                                <img src="{{$OBJ_User->image}}" alt="" style="width:60px;height: 60px;">
                            </td>
                            <td>
                                {!!checkStatusUser($OBJ_User->status)!!}
                            </td>
                            <td>
                                <a href="{{route('user.show',$OBJ_User->id)}}" class="btn btn-warning"><i class="fa fa-eye "></i></a>
                                <a href="{{route('user.edit',$OBJ_User->id)}}" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                                @if($OBJ_User->status == 1)
                                <button class="btn btn-danger" onclick="getUserById('{{$OBJ_User->id}}')" data-toggle="modal" data-target="#modalBlockUser">
                                    <i class="fa fa-lock"></i>
                                </button>
                                @else
                                <button class="btn btn-success" onclick="getUserById('{{$OBJ_User->id}}')" data-toggle="modal" data-target="#modalActiveUser">
                                    <i class="fa fa-unlock"></i>
                                </button>
                                @endif
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteUser">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <form action="{{route('user.destroy',$OBJ_User->id)}}" method="post" id="delete">
                                @csrf
                                @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('includes.admin.user.modal-delete')
@include('includes.admin.user.modal-active-block')
@endsection 