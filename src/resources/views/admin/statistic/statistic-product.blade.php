@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Statistics of most ordered products')}}</h1>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('custom.Choose a timeline')}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" onclick="searchStatisticProductByTime('{{$today}}','Today')">{{__('custom.Today')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticProductByTime('{{$yesterday}}','Yesterday')">{{__('custom.Yesterday')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticProductByLastWeek('{{$start_week}}','{{$end_week}}','Last Week')">{{__('custom.Last week')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticProductByTime('{{$this_month}}','This month')">{{__('custom.This month')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticProductByTime('{{$last_month}}','Last month')">{{__('custom.Last month')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticProductByTime('{{$this_year}}','This year')">{{__('custom.This year')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticProductByTime('{{$last_year}}','Last year')">{{__('custom.Last year')}}</button>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <a href="{{route('export_statistic_product')}}" class="btn btn-success">{{__('custom.Export Excel')}} <i class="fas fa-file-excel"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('custom.Number In Order')}}</th>
                        <th>{{__('custom.Product Name')}}</th>
                        <th>{{__('custom.Image')}}</th>
                        <th>{{__('custom.Amount Of Order')}}</th>
                        <th>{{__('custom.Date time')}}</th>
                        <th>{{__('custom.Total Money')}}</th>
                    </tr>
                </thead>
                <tbody id="statistic_product">
                    @foreach($statistic_products as $statistic_product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$statistic_product->name}}</td>
                            <td>
                                <img src="{{asset('/images/products')}}/{{$statistic_product->image}}" id="img_product">
                            </td>
                            <td>{{$statistic_product->amount_of_order}}</td>
                            <td>{{__('custom.Today')}}</td>
                            <td>{{formatPrice($statistic_product->total_money_order_product)}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('includes.admin.statistic.statistic-product-js');
@endsection