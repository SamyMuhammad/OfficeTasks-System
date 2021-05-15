@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'المهمة '. $item->id)

@section('extra-css')
@endsection
@section('bar-title', 'المهام')
@section('page-title', 'المهمة '. $item->id)

@section('content')
<div class="container">
    <table class="show-data">
        <tr class="data-group">
            <th>رقم الفاتورة</th>
            <td>{{ optional($item->receipt)->id }}</td>
        </tr>
        <tr class="data-group">
            <th>تاريخ إنشاء الفاتورة</th>
            <td>{{ optional($item->receipt)->created_at->format('Y-m-d') }}</td>
        </tr>
        <tr class="data-group">
            <th>تاريخ إسناد المهمة</th>
            <td>{{ $item->assigningTime ?? '---' }}</td>
        </tr>
        <tr class="data-group">
            <th>تاريخ تحويلها إلى نشطة</th>
            <td>{{ $item->activation_date ?? '---' }}</td>
        </tr>
        <tr class="data-group">
            <th>تاريخ الإغلاق</th>
            <td>{{ $item->closing_date }}</td>
        </tr>
        <tr class="data-group">
            <th>تاريخ تعديل الحالة</th>
            <td>{{ $item->status_changing_date }}</td>
        </tr>
        <tr class="data-group">
            <th>الحالة</th>
            <td>{{ optional($item->task_status)->name }}</td>
        </tr>
        <tr class="data-group">
            <th>الوقت المستغرق</th>
            <td>{{ $item->taskTime ? $item->taskTime. " يوم" : '---'}}</td>
        </tr>
        <tr class="data-group">
            <th>الموظفين</th>
            <td>
                <ul>
                    @forelse ($item->users as $user)
                        <li>{{ $user->name }}</li>
                    @empty
                    لا يوجد
                    @endforelse
                </ul>
            </td>
        </tr>
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