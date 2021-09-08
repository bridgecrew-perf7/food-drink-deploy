@extends('layouts.order')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.List Order')}}</h1>
<div class="card mb-4">
    <div class="card-header">
        <a href="{{route('export_order')}}" class="btn btn-success">{{__('custom.Export Excel')}} <i class="fas fa-file-excel"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('custom.Number In Order')}}</th>
                        <th>{{__('custom.Order Date')}}</th>
                        <th>{{__('custom.User Order')}}</th>
                        <th>{{__('custom.Total Money')}}</th>
                        <th>{{__('custom.Status')}}</th>
                        <th>{{__('custom.Action')}}</th>
                    </tr>
                </thead>
                <tbody id="list_product_order">
                    @foreach($list_orders as $list_order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$list_order->created_at}}</td>
                            <td>{{$list_order->users->name}}</td>
                            <td>{{ formatPrice($list_order->total_money) }}</td>
                            <td>
                                {!!checkStatusOrder($list_order->status)!!}
                            </td>
                            <td>
                                <button class="btn btn-warning" onclick="getOrderDetail('{{$list_order->id}}')" data-toggle="modal" data-target="#modalViewDetail">
                                    <i class="fa fa-eye"></i>
                                </button>
                                @if($list_order->status == 0)
                                <button class="btn btn-success" onclick="getOrderById('{{$list_order->id}}')" data-toggle="modal" data-target="#modalConfirmOrder">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button class="btn btn-danger" onclick="getOrderById('{{$list_order->id}}')" data-toggle="modal" data-target="#modalCancelOrder">
                                    <i class="fa fa-times"></i>
                                </button>
                                @elseif($list_order->status == 1)
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalDeliveryOrder">
                                    <i class="fa fa-truck"></i>
                                </button>
                                <button class="btn btn-danger" onclick="getOrderById('{{$list_order->id}}')" data-toggle="modal" data-target="#modalCancelOrder">
                                    <i class="fa fa-times"></i>
                                </button>
                                @else
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteOrder">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <form action="{{route('order.destroy',$list_order->id)}}" method="post" id="delete">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="{{route('admin')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{__('custom.Exit')}}</a>
@include('includes.admin.order.modal-view-detail')
@include('includes.admin.order.modal-confirm')
@include('includes.admin.order.modal-cancel')
@include('includes.admin.order.modal-delete')
@endsection