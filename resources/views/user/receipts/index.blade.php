@extends('layouts.app')

@section('title', $title)
@include('layouts._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', $title)
@section('page-title', $title)

@section('content')
<div class="margin-bottom-20">
    <form action="{{ properRoute('receipts.search') }}" method="GET" class="form-inline">
        <div class="form-group">
            <div class="input-group input-medium">
                <input type="text" value="{{ request()->key }}" name="key" class="form-control" placeholder="البحث في الفواتير">
                <span class="input-group-btn">
                    <button type="submit" class="btn red">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </form>
    <small>عند البحث بالتاريخ يجب أن يكون علي الصيغة <bdi>"2021-03-16"</bdi></small>
</div>

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
                            <th class="text-center">رقم الفاتورة</th>
                            <th>العميل</th>
                            <th>المشروع</th>
                            <th>الموظف</th>
                            <th>طريقة الدفع</th>
                            <th>القسم</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center iteration">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->id }}</td>
                                <td>{{ optional($item->client)->name }}</td>
                                <td>{{ $item->project }}</td>
                                <td>{{ optional($item->user)->name }}</td>
                                <td>{{ optional($item->payment_method)->name }}</td>
                                <td>{{ optional($item->category)->name }}</td>
                                <td class="text-center">
                                    @can('show receipts')
                                    <a href="{{ properRoute('receipts.show', $item->id) }}" class="btn blue-sharp btn-outline sbold uppercase">عرض</a>
                                    @endcan
                                    
                                    @can('edit receipts')
                                    <a href="{{ properRoute('receipts.edit', $item->id) }}" class="btn purple-sharp btn-outline sbold uppercase">تعديل</a>
                                    @endcan

                                    @can('delete receipts')
                                    <form action="{{ properRoute('receipts.destroy', $item->id) }}" method="POST" class="destroy-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"  onclick="deleteConfirmation()" class="btn red-mint btn-outline sbold uppercase">حذف</button>
                                    </form>
                                    @endcan

                                    @can('view receipts-payments')
                                    <a href="{{ properRoute('receipts.payments.index', $item->id) }}" class="btn grey-mint btn-outline sbold uppercase">الدفعات</a>
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
@endsection

@section('extra-js')
@endsection