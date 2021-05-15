@extends('layouts.app')

@section('title', 'الإعدادات')
@include('layouts._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', 'الإعدادات')
@section('page-title', 'الإعدادات')

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
                            <th class="text-center">القيمة</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">{!! $item->renderedValue !!}</td>
                                <td class="text-center">                                    
                                    @can('edit settings')
                                    <button onclick="editCategory('{{ $item->id }}')" class="btn purple-sharp btn-outline sbold uppercase">تعديل</button>
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
</div>
@include('admin.settings._modal')
@endsection