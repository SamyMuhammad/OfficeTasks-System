@extends('layouts.app')

@section('title', $pageTitle)
@include('layouts._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', $pageTitle)
@section('page-title', $pageTitle)

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
                            {{-- <th class="text-center">#</th> --}}
                            <th>رقم الفاتورة</th>
                            <th>تاريخ إنشاء الفاتورة</th>
                            <th>تاريخ إسناد المهمة</th>
                            <th>تاريخ تحويلها إلى نشطة</th>
                            <th>تاريخ الإغلاق</th>
                            @if (routeIsAdmin())
                                <th>الحالة</th>
                                <th>تاريخ تعديل الحالة</th>
                                <th>الوقت المستغرق</th>
                            @elseif(request()->routeIs('tasks.myTasks'))
                                <th>تعديل الحالة</th>
                            @else
                                <th>الحالة</th>
                            @endif
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                {{-- <td class="iteration text-center">{{ $loop->iteration }}</td> --}}
                                <td>{{ optional($item->receipt)->id }}</td>
                                <td>{{ optional($item->receipt)->created_at->format('Y-m-d') }}</td>
                                <td>{{ $item->assigningTime ?? '---' }}</td>
                                <td>{{ $item->activation_date ?? '---' }}</td>
                                <td>{{ $item->closing_date }}</td>
                                @if (routeIsAdmin())
                                    <td>{{ optional($item->task_status)->name }}</td>
                                    <td>{{ $item->status_changing_date }}</td>
                                    <td>{{ $item->taskTime ? $item->taskTime. " يوم" : '---'}}</td>
                                @elseif(request()->routeIs('tasks.myTasks'))
                                    <td>
                                        <form id="change-status{{ $item->id }}" action="{{ route('tasks.changeStatus', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="task_status_id" onchange="changeStatus({{ $item->id }})">
                                                @foreach ($task_statuses as $status)
                                                    <option value="{{ $status->id }}" {{ $item->task_status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                @else
                                    <td>{{ optional($item->task_status)->name }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{{ properRoute('tasks.show', $item->id) }}" class="btn blue-sharp btn-outline sbold uppercase">عرض</a>
                                    
                                    @if(request()->routeIs('tasks.categoryTasks') && !$item->users->pluck('id')->contains(auth()->id()))
                                    <form action="{{ route('tasks.accept', $item->id) }}" method="POST">
                                        @method('POST')
                                        @csrf
                                        <button type="submit" onclick="acceptConfirmation()" class="btn yellow btn-outline sbold uppercase">استلام</button>
                                    </form>
                                    @endif

                                    @can('edit tasks')
                                    <a href="{{ route('admin.tasks.edit', $item->id) }}" class="btn purple-sharp btn-outline sbold uppercase">تعديل</a>
                                    @endcan

                                    @can('delete tasks')
                                    <form action="{{ route('admin.tasks.destroy', $item->id) }}" method="POST" class="destroy-form">
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
@endsection

@section('extra-js')
@if (request()->routeIs('tasks.myTasks'))
    <script>
        function changeStatus(taskId) {
            var check = confirm('هل ترغب في تغيير حالة المهمة؟')
            if (check) {
                document.getElementById('change-status'+taskId).submit();
            }
        }
    </script>
@endif
@endsection