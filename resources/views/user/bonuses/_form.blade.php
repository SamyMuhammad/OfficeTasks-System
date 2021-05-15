@section('page-style-plugins')
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<div class="row form-body">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">الموظف</label>
            <select name="user_id" class="form-control select2" data-placeholder="اختر الموظف">
                <option value=""></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" 
                        {{ isset($item) && (optional($item->user)->id == $user->id) ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">المبلغ</label>
            <div class="input-icon">
                <i class="fa fa-money"></i>
                <input type="number" min="0" step="0.1" name="amount" value="{{ isset($item) ? $item->amount : old('amount') }}"
                    class="form-control" placeholder="ادخل المبلغ">
            </div>
        </div>
        <div class="form-group margin-top-25">
            <div class="md-checkbox">
                <input type="checkbox" name="is_paid" id="is-paid" value="1" class="md-check" {{ isset($item) && $item->is_paid ? 'checked' : (old('is_paid') ? 'checked' : '') }}>
                <label for="is-paid">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span> تم صرف المكافأة
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