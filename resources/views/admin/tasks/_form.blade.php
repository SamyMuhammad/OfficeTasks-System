@section('page-style-plugins')
<link href="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<div class="row form-body">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">الفاتورة</label>
            <select name="receipt_id" class="form-control select2" data-placeholder="اختر الفاتورة">
                <option value=""></option>
                @foreach ($models['receipts'] as $receipt)
                    <option value="{{ $receipt->id }}" {{ isset($item) && $item->receipt_id == $receipt->id ? 'selected' : '' }}>
                        {{ $receipt->id }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">الحالة</label>
            <select name="task_status_id" class="form-control select2" placeholder="اختر الحالة">
                @foreach ($models['task_statuses'] as $status)
                    <option value="{{ $status->id }}" {{ isset($item) && $item->task_status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">تاريخ الإغلاق</label>
            <div class="input-group date date-picker" data-date="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                <input type="text" class="form-control" name="closing_date" value="{{ isset($item) ? $item->closing_date : old('closing_date') }}"
                placeholder="ادخل تاريخ الإغلاق">
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">الموظفين</label>
            <select name="users[]" multiple class="form-control select2" data-placeholder="اختر الموظفين">
                <option value=""></option>
                @foreach ($models['users'] as $user)
                    <option value="{{ $user->id }}" {{ isset($item) && $item->users->pluck('id')->contains($user->id) ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn green">حفظ</button>
</div>

@section('page-script-plugins')
<script src="{{ asset('metronic/assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
@endsection
@section('page-level-scripts')
<script src="{{ asset('metronic/assets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>
@endsection