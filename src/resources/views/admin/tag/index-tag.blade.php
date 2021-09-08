@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.List_tag')}}</h1>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="{{route('export_tag_excel')}}" class="btn btn-success">{{__('custom.Export Excel')}} <i class="fas fa-file-excel"></i></a>
                <form id="import_tag_excel" method="POST"  action="{{route('import_tag_excel')}}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="file" name="file" placeholder="Choose file">
                            </div>
                            @error('file')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success" id="submit">{{__('custom.Import Excel')}} <i class="fas fa-file-excel"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            <a href="{{route('tag.create')}}" class="btn btn-primary" id="btn_add_category">{{__('custom.Add_tag')}} <i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('custom.Number In Order')}}</th>
                        <th>{{__('custom.Name_tag')}}</th>
                        <th>{{__('custom.Created at')}}</th>
                        <th>{{__('custom.Status')}}</th>
                        <th>{{__('custom.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($OBJ_Tags as $OBJ_Tag)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$OBJ_Tag->name}}</td>
                            <td>{{$OBJ_Tag->created_at}}</td>
                            <td>
                                {!!checkStatusTag($OBJ_Tag->status)!!}
                            </td>
                            <td>
                                {!!checkStatusTagButton($OBJ_Tag->status,$OBJ_Tag->id)!!}
                                <a href="{{route('tag.edit',$OBJ_Tag->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit "></i>
                                </a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteTag">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <form action="{{route('tag.destroy',$OBJ_Tag->id)}}" method="post" id="delete">
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
@include('includes.admin.tag.modal-hidden')
@include('includes.admin.tag.modal-show')
@include('includes.admin.tag.modal-delete')
@endsection