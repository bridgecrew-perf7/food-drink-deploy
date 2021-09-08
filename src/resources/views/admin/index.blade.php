@extends('layouts.admin')
@section('content')
<h1>{{__('custom.home_page')}}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">{{__('custom.home_page')}}</a></li>
    <li class="breadcrumb-item active">{{__('custom.Statistic')}}</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h4>{{__('custom.Gross Product')}}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h2>{{$statistic_total['Gross_Product']}}</h2>
                <div class="small text-white"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <h4>{{__('custom.Total Orders')}}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h2>{{$statistic_total['Total_Order']}}</h2>
                <div class="small text-white"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h4>{{__('custom.Total Category')}}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h2>{{$statistic_total['Total_Category']}}</h2>
                <div class="small text-white"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
                <h4>{{__('custom.Total revenue')}}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h2>{{formatPrice($statistic_total['Total_Revenue'])}}</h2>
                <div class="small text-white"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar mr-1"></i>
                {{__('custom.Number of orders for the month of this year')}}
            </div>
            <div class="card-body">
                @if(empty($number_of_orders))
                <p>{{__('custom.No orders yet so chart can not be shown')}}</p>
                @else
                <canvas id="myBarChart" width="100%" height="40"></canvas>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar mr-1"></i>
                {{__('custom.Top 5 most ordered products of the month')}}
            </div>
            <div class="card-body">
                @if(empty($name_products))
                <p>{{__('custom.No orders yet so chart can not be shown')}}</p>
                @else
                <canvas id="myPieChart" width="100%" height="40"></canvas>
                @endif
            </div>
        </div>
    </div>
</div>
@include('includes.admin.home.statistic-product-chart-bar-js')

@stop