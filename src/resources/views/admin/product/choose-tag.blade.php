@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h2 class="mt-4">{{__('custom.title_choose_tag')}} {{$OBJ_Products->name}}</h2>
<div class="row">
    <div class="card mb-4 col-md-8">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{__('custom.Number In Order')}}</th>
                            <th>{{__('custom.Name_tag')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($OBJ_tags as $OBJ_tag)   
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td id="name">{{$OBJ_tag->name}}</td>
                            <td>
                                <button class="btn btn-primary" onclick="chooseTag('{{$OBJ_tag->id}}','{{$OBJ_tag->name}}')">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
        </div>
    </div>
    <div class="card mb-4 col-md-4">
        <div class="table-responsive">
            <table class="table" id="tableTag" width="100%">
                <thead>
                    <tr>
                        <th hidden></th>
                        <th>{{__('custom.Name_tag')}}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="list_tags">
                    @foreach($OBJ_Product_Tags as $OBJ_Product_Tag)
                    <tr data-id="{{$OBJ_Product_Tag->id_tag}}">
                        <td id="id_tag" hidden>{{$OBJ_Product_Tag->id_tag}}</td>
                        <td id="name">{{$OBJ_Product_Tag->name}}</td>
                        <td>
                            <button class="btn btn-danger" onclick="removeTag('{{$OBJ_Product_Tag->id_tag}}')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary" id="btn_save_tag" style="float:right;" onclick="saveChooseTag('{{$OBJ_Products->id}}')">{{__('custom.Save')}} 
                <i class="fa fa-save"></i>
            </button>
        </div>
    </div>
</div>
@include('includes.admin.product.choose-tag-js')
@endsection