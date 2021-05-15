@extends('layouts.app')

@section('title', 'المصروفات العامة')

@section('extra-css')
@endsection

@section('bar-title', 'المصروفات العامة')
@section('page-title', 'المصروفات العامة')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                @include('user.expenses._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection