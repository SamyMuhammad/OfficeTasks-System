@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'الفاتورة '. $receipt->id)

@section('extra-css')
@endsection
@section('bar-title', 'الفواتير')
@section('page-title')
فاتورة خدمات
@if (! $receipt->isPaid())
    @can('create receipts-payments')
    <a class="btn btn-primary" href="#create-form" style="float: left; word-spacing: 3px;" data-toggle="modal">دفع مستحق</a>
    @endcan
@endif
@endsection

@section('content')
<div class="container">
    <div class="col-md-7 receipt">
        <table class="show-data no-border">
            <tr class="data-group">
                <th class="no-border">العميل/</th>
                <td class="no-border">{{ optional($receipt->client)->name }}</td>
                <td class="no-border">{{ $receipt->id }}</td>
                <th class="no-border">:ID</th>
            </tr>
            <tr class="data-group">
                <th class="no-border">المشروع/</th>
                <td class="no-border">{{ $receipt->project }}</td>
                <td class="no-border"></td>
                <th class="no-border"></th>
            </tr>
            <tr class="data-group">
                <th class="no-border">مدخل الفاتورة/</th>
                <td class="no-border">{{ optional($receipt->user)->name }}</td>
                <td class="no-border">{{ $receipt->creationDate }}</td>
                <th class="no-border">:Date</th>
            </tr>
            {{-- <tr class="data-group">
                <th>الهاتف</th>
                <td>{{ $receipt->phone }}</td>
            </tr> --}}
        </table>
        @if ($receipt->services->count() > 0)
        <table class="show-data margin-top-30">
            <thead>
                <tr class="receipt-table-titles">
                    <th>البيان</th>
                    <th>الوصف</th>
                    <th>السعر</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receipt->services as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->pivot->description }}</td>
                        <td>SR {{ $item->pivot->price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">المدفوع</td>
                    <td>SR {{ $receipt->paid }}</td>
                </tr>
                <tr>
                    <td colspan="2">المتبقي</td>
                    <td>SR {{ $receipt->remaining }}</td>
                </tr>
                <tr>
                    <td colspan="2">الإجمالي</td>
                    <td>SR {{ $receipt->total }}</td>
                </tr>
            </tbody>
        </table>
        @else
        <h3 class="text-center margin-top-40">لا يوجد خدمات</h3>
        @endif
        <table class="show-data no-border margin-top-20">
            <tr class="data-group">
                <th class="no-border" style="width: 25%">طريقة الدفع:</th>
                <td class="no-border" style="width: 25%">{{ optional($receipt->payment_method)->name }}</td>
                <td class="no-border"></td>
                <th class="no-border"></th>
            </tr>
        </table>
        <div class="row">
            <div class="col-md-7 col-md-offset-5">
                <table class="show-data no-border margin-top-40" style="width: 100%">
                    @foreach ($settings as $setting)
                    <tr class="data-group">
                        <th class="no-border">{{ $setting->name }}:</th>
                        <td class="no-border">{{ $setting->value }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-xs-8 invoice-block">
    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> طباعة
        <i class="fa fa-print"></i>
    </a>
</div>
<div class="clearfix"></div> --}}

@include('user.receipts-payments.create_modal')
@endsection

@section('extra-js')
@endsection