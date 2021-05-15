@extends('layouts.app')

@section('title', 'الواردات')
{{-- @include('layouts._datatables_assets') --}}

@section('extra-css')
@endsection
@section('bar-title', 'الواردات')
@section('page-title', 'الواردات')

@section('content')
<!-- BEGIN STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="javascript:;">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $allPaidAmount }} SR</span>
                </div>
                <div class="desc">المدفوع</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="javascript:;">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $allRemainingAmount }} SR</span></div>
                <div class="desc">الآجل</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="javascript:;">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span></span>{{ $allTotalAmount }} SR</div>
                <div class="desc">الإجمالي</div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
<!-- END STATS 1-->

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            {{-- <div class="portlet-title">
                <div class="tools"> </div>
            </div> --}}
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">رقم الفاتورة</th>
                            <th class="text-center">الإجمالي</th>
                            <th class="text-center">المدفوع</th>
                            <th class="text-center">المتبقي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $item)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <a href="{{ route('receipts.show', $item->id) }}">{{ $item->id }}</a>
                                </td>
                                <td class="text-center">{{ $item->total }}</td>
                                <td class="text-center">{{ $item->paid }}</td>
                                <td class="text-center">{{ $item->remaining }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-12">{!! $receipts->links() !!}</div>
</div>
@endsection