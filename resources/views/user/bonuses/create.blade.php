@extends('layouts.app')

@section('title', 'المكافآت')

@section('extra-css')
@endsection

@section('bar-title', 'المكافآت')
@section('page-title', 'المكافآت')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('bonuses.store') }}" method="POST">
                @csrf
                @include('user.bonuses._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection