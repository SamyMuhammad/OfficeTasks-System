@extends('layouts.app')

@section('title', 'المهام')

@section('extra-css')
@endsection

@section('bar-title', 'المهام')
@section('page-title', 'تعديل مهمة')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('admin.tasks.update', $item->id) }}" method="POST">
                @method('PATCH')
                @csrf
                @include('admin.tasks._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection