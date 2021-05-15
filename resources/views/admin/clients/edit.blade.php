@extends('layouts.app')

@section('title', 'العملاء')

@section('extra-css')
@endsection

@section('bar-title', 'العملاء')
@section('page-title', 'تعديل عميل')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
                @method('PATCH')
                @csrf
                @include('admin.clients._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection