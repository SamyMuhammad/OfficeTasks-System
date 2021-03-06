@extends('layouts.app')
@section('title', 'لوحة التحكم')

@section('page-title', '')
@section('content')
<div>
    <h3>لوحة التحكم</h3>
</div>

<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('admin.users.index') }}">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $usersCount }}</span>
                </div>
                <div class="desc">الموظفين</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('admin.clients.index') }}">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $clientsCount }}</span></div>
                <div class="desc">العملاء</div>
            </div>
        </a>
    </div>
    {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('issue.index') }}">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $issuesCount }}</span>
                </div>
                <div class="desc">القضايا</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('expert-issue.index') }}">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span></span>{{ $expertIssuesCount }}</div>
                <div class="desc">قضايا الخبراء</div>
            </div>
        </a>
    </div> --}}
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
@endsection