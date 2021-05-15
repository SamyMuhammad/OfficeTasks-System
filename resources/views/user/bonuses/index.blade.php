@extends('layouts.app')

@section('title', 'المكافآت')
@include('layouts._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', 'المكافآت')
@section('page-title', 'المكافآت')

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
                            <th>الموظف</th>
                            <th>المبلغ</th>
                            <th>تم الصرف</th>
                            <th>التاريخ</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td>{{ optional($item->user)->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->isPaidInText }}</td>
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                <td>
                                    {{-- @can('show bonuses')
                                    <a href="{{ route('bonuses.show', $item->id) }}" class="btn blue-sharp btn-outline sbold uppercase">عرض</a>
                                    @endcan --}}
                                    
                                    @can('edit bonuses')
                                    <a href="{{ route('bonuses.edit', $item->id) }}" class="btn purple-sharp btn-outline sbold uppercase">تعديل</a>
                                    @endcan

                                    @can('delete bonuses')
                                    <form action="{{ route('bonuses.destroy', $item->id) }}" method="POST" class="destroy-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"  onclick="deleteConfirmation()" class="btn red-mint btn-outline sbold uppercase">حذف</button>
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
    <div class="col-md-12">{!! $items->links() !!}</div>
</div>
@endsection

@section('extra-js')
@endsection