@extends('management.layouts.master')
@section('title')
    Dashboard - {{config('app.name')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Dashboard</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a>
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Users</div>
                    <h3 class="m-b-10 m-t-0">
                        {{count($users)}}
                    </h3>
                    <div class="icon">
                        <div class="chart chart-bar"><canvas width="109" height="45" style="display: inline-block; width: 109px; height: 45px; vertical-align: top;"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Trial Accounts</div>
                    <h3 class="m-b-10 m-t-0">
                        {{count($trial)}}
                    </h3>
                    <div class="icon">
                        <span class="chart chart-line"><canvas width="60" height="45" style="display: inline-block; width: 60px; height: 45px; vertical-align: top;"></canvas></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Active Subscribers</div>
                    <h3 class="m-b-10 m-t-0">
                        {{count($active)}}
                    </h3>
                    <div class="icon">
                        <div class="chart chart-pie"><canvas width="45" height="45" style="display: inline-block; width: 45px; height: 45px; vertical-align: top;"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Unregistered</div>
                    <h3 class="m-b-10 m-t-0">
                        {{count($takenbutnotpurchased)}}
                    </h3>
                    <div class="icon">
                        <div class="chart" id="liveChart"><canvas width="40" height="45" style="display: inline-block; width: 40px; height: 45px; vertical-align: top;"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="row clearfix">--}}
{{--            <!-- Task Info -->--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="header">--}}
{{--                        <h2>--}}
{{--                            <strong>Recent</strong> Jobs--}}
{{--                        </h2>--}}
{{--                    </div>--}}
{{--                    <div class="tableBody">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-hover dashboard-task-infos">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Category</th>--}}
{{--                                    <th>Location</th>--}}
{{--                                    <th width="20%">Published Date</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($jobs as $key => $job)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$key+1}}</td>--}}
{{--                                        <td>{{$job->title}}</td>--}}
{{--                                        <td>{{$job->category->title}}</td>--}}
{{--                                        <td>{{$job->address}}</td>--}}
{{--                                        <td>{{date('Y/M/d',strtotime($job->created_at))}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- #END# Task Info -->--}}
{{--        </div>--}}
    </div>
@endsection
