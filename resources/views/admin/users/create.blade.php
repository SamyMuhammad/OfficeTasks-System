@extends('layouts.app')

@section('title', 'الموظفين')

@section('extra-css')
@endsection

@section('bar-title', 'الموظفين')
@section('page-title', 'إضافة موظف')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                @include('admin.users._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection