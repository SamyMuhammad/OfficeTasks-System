@extends('layouts.app')

@section('title', 'تعديل راتب')

@section('extra-css')
@endsection

@section('bar-title', 'الرواتب')
@section('page-title', 'تعديل راتب')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('paid-salaries.update', $item->id) }}" method="POST">
                @method('PATCH')
                @csrf
                @include('user.paid-salaries._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection