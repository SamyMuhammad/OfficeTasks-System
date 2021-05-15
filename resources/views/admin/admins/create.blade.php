@extends('layouts.app')

@section('title', 'المديرين')

@section('extra-css')
@endsection

@section('bar-title', 'المديرين')
@section('page-title', 'إضافة مدير')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('admin.admins.store') }}" method="POST">
                @csrf
                @include('admin.admins._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection