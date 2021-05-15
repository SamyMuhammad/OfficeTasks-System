@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'المدير '. $admin->name)

@section('extra-css')
@endsection
@section('bar-title', 'المديرين')
@section('page-title', 'المدير '. $admin->name)

@section('content')
<div class="container">
    <table class="show-data">
        <tr class="data-group">
            <th>الاسم</th>
            <td>{{ $admin->name }}</td>
        </tr>
        <tr class="data-group">
            <th>الهاتف</th>
            <td>{{ $admin->phone }}</td>
        </tr>
        <tr class="data-group">
            <th>البريد الإلكتروني</th>
            <td>{{ $admin->email }}</td>
        </tr>
        {{-- <tr class="data-group">
            <th>تاريخ الإنشاء</th>
            <td>{{ $admin->created_at }}</td>
        </tr>
        <tr class="data-group">
            <th>تاريخ آخر تعديل</th>
            <td>{{ $admin->updated_at }}</td>
        </tr> --}}
    </table>
</div>
{{-- <div class="col-xs-8 invoice-block">
    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> طباعة
        <i class="fa fa-print"></i>
    </a>
</div> --}}
@endsection

@section('extra-js')
@endsection