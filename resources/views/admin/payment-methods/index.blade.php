@extends('layouts.app')

@section('title', 'طرق الدفع')
@include('layouts._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', 'طرق الدفع')
@section('page-title')
طرق الدفع
@can('create payment-methods')
<a class="btn btn-primary" href="#create-form" style="float: left; word-spacing: 3px;" data-toggle="modal">إضافة</a>
@endcan
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            {{-- <div class="portlet-title">
                <div class="tools"> </div>
            </div> --}}
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">الاسم</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">                                    
                                    @can('edit payment-methods')
                                    <button onclick="editCategory('{{ $item->id }}')" class="btn purple-sharp btn-outline sbold uppercase">تعديل</button>
                                    @endcan

                                    @can('delete payment-methods')
                                    <form action="{{ route('admin.payment-methods.destroy', $item->id) }}" method="POST" class="destroy-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="deleteConfirmation()" class="btn red-mint btn-outline sbold uppercase">حذف</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-12">{!! $items->render() !!}</div>
</div>
@include('admin.payment-methods._modal')
@endsection