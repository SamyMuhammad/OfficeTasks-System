@extends('layouts.app')

@section('title', 'دفعات الفاتورة '. $receipt->id)
@include('layouts._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', 'دفعات الفاتورة '. $receipt->id)
@section('page-title', 'دفعات الفاتورة '. $receipt->id)

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
                            <th class="text-center">المبلغ</th>
                            <th class="text-center">التاريخ</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->amount }} SR</td>
                                <td class="text-center">{{ $item->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">                                    
                                    @can('edit receipts-payments')
                                    <button onclick="editPayment('{{ $item->id }}')" class="btn purple-sharp btn-outline sbold uppercase">تعديل</button>
                                    @endcan

                                    @can('delete receipts-payments')
                                    <form action="{{ properRoute('payments.destroy', $item->id) }}" method="POST" class="destroy-form">
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
    <div class="col-md-12">{!! $items->render() !!}</div>
</div>
@include('user.receipts-payments.edit_modal')
@endsection