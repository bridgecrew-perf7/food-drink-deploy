@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.Statistics of the most searched tags')}}</h1>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('custom.Choose a timeline')}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" onclick="searchStatisticTagByTime('{{$today}}','Today')">{{__('custom.Today')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticTagByTime('{{$yesterday}}','Yesterday')">{{__('custom.Yesterday')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticTagByLastWeek('{{$start_week}}','{{$end_week}}','Last Week')">{{__('custom.Last week')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticTagByTime('{{$this_month}}','This month')">{{__('custom.This month')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticTagByTime('{{$last_month}}','Last month')">{{__('custom.Last month')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticTagByTime('{{$this_year}}','This year')">{{__('custom.This year')}}</button>
                        <button class="dropdown-item" onclick="searchStatisticTagByTime('{{$last_year}}','Last year')">{{__('custom.Last year')}}</button>
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
                        <th>{{__('custom.Name_tag')}}</th>
                        <th>{{__('custom.Number_of_search')}}</th>
                        <th>{{__('custom.Date time')}}</th>
                    </tr>
                </thead>
                <tbody id="statistic_tag">
                    @foreach($statistic_tags as $statistic_tag)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$statistic_tag->name}}</td>
                            <td>{{$statistic_tag->number_of_search}}</td>
                            <td>{{__('custom.Today')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('includes.admin.statistic.statistic-tag-js');
@endsection