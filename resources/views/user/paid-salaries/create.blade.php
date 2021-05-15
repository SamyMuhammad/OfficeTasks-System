@extends('layouts.app')

@section('title', 'صرف راتب')

@section('extra-css')
@endsection

@section('bar-title', 'الرواتب')
@section('page-title', 'صرف راتب')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('paid-salaries.store') }}" method="POST">
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