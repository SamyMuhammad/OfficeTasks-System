@extends('layouts.app')

@section('title', 'تعديل فاتورة')

@section('extra-css')
@endsection

@section('bar-title', 'الفواتير')
@section('page-title', 'تعديل فاتورة')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ properRoute('receipts.update', $receipt->id) }}" method="POST">
                @method('PATCH')
                @csrf
                @include('user.receipts._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@can('create clients')
@include('user.receipts.client_modal')
@endcan
@endsection

@section('extra-js')
<script>
    $(document).ready(function () {
        showTotal("{{ $receipt->total }}");
    });
</script>
@endsection