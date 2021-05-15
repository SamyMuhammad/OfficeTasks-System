@extends('layouts.app')

@section('title', 'الموظفين')

@section('extra-css')
@endsection

@section('bar-title', 'الموظفين')
@section('page-title', 'تعديل موظف')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @method('PATCH')
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