@section('page-style-plugins')
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<div class="row form-body">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">البيان</label>
            <select name="service_id" class="form-control select2" data-placeholder="اختر البيان">
                <option value=""></option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" 
                        {{ isset($item) && (optional($item->service)->id == $service->id) ? 'selected' : (old('service_id') == $service->id ? 'selected' : '') }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">نوع الصرف</label>
            <select name="expense_type_id" class="form-control select2" data-placeholder="اختر نوع الصرف">
                <option value=""></option>
                @foreach ($expense_types as $expense_type)
                    <option value="{{ $expense_type->id }}" 
                        {{ isset($item) && (optional($item->expense_type)->id == $expense_type->id) ? 'selected' : (old('expense_type_id') == $expense_type->id ? 'selected' : '') }}>
                        {{ $expense_type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">المصدر</label>
            <input type="text" name="source" value="{{ isset($item) ? $item->source : old('source') }}"
                class="form-control" placeholder="ادخل المصدر">
        </div>
        <div class="form-group margin-top-25">
            <div class="md-checkbox">
                <input type="checkbox" name="is_paid" id="is-paid" value="1" class="md-check" {{ isset($item) && $item->is_paid ? 'checked' : (old('is_paid') ? 'checked' : '') }}>
                <label for="is-paid">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span> تم الصرف
                </label>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn green">حفظ</button>
</div>

@section('page-script-plugins')
<script src="{{ asset('metronic/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
@endsection
@section('page-level-scripts')
<script src="{{ asset('metronic/assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>
@endsection