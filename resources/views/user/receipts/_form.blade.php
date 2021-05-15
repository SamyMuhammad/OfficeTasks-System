@section('page-style-plugins')
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<div class="row form-body">
    <div class="col-md-6" id="fields-area">
        <div class="form-group">
            <label class="control-label">العميل</label>
            <div class="input-group select2-bootstrap-append">
                <select name="client_id" class="form-control select2" data-placeholder="اختر العميل">
                    <option value=""></option>
                    @foreach ($models['clients'] as $client)
                        <option value="{{ $client->id }}" {{ isset($receipt) && $receipt->client_id == $client->id ? 'selected' : '' }}>
                            {{ $client->name . ' - ' . $client->phone }}
                        </option>
                    @endforeach
                </select>
                @can('create clients')
                <span class="input-group-btn">
                    <a class="btn btn-default" href="#create-client" data-toggle="modal"><i class="fa fa-plus"></i></a>
                </span>
                @endcan
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">القسم</label>
            <select name="category_id" class="form-control select2" data-placeholder="اختر القسم">
                <option value=""></option>
                @foreach ($models['categories'] as $category)
                    <option value="{{ $category->id }}" {{ isset($receipt) && $receipt->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">المشروع</label>
            <input type="text" name="project" value="{{ isset($receipt) ? $receipt->project : old('project') }}" class="form-control"
                placeholder="ادخل المشروع">
        </div>
        <div class="form-group">
            <label class="control-label">طريقة الدفع</label>
            <select name="payment_method_id" class="form-control select2" data-placeholder="اختر طريقة الدفع">
                <option value=""></option>
                @foreach ($models['paymentMethods'] as $payment)
                    <option value="{{ $payment->id }}" {{ isset($receipt) && $receipt->payment_method_id == $payment->id ? 'selected' : '' }}>
                        {{ $payment->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">البيان</label>
            <select name="services[]" id="services-select2" class="form-control select2" multiple data-placeholder="اختر البيان">
                <option value=""></option>
                @foreach ($models['services'] as $service)
                    <option value="{{ $service->id }}" {{ isset($receipt) && $receipt->services->pluck('id')->contains($service->id) ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <h4 id="total-heading" class="text-center display-none"></h4>
        <div class="form-group col-xs-6 pdr-0">
            <label class="control-label">المدفوع</label>
            <input type="number" id="paid" min="0" step="0.1" name="paid" value="{{ isset($receipt) ? $receipt->paid : old('paid') }}" class="form-control"
                placeholder="ادخل المدفوع" {{ isset($receipt) ? 'readonly' : '' }}>
                @if (isset($receipt))
                    <small>لتعديل المبلغ المدفوع قم بتعديل <a href="{{ properRoute('receipts.payments.index', $receipt->id) }}">قيم الدفعات</a> للفاتورة.</small>
                @endif
        </div>
        <div class="form-group col-xs-6 pdl-0">
            <label class="control-label">المتبقي</label>
            <input type="number" id="remaining" min="0" step="0.1" value="{{ isset($receipt) ? $receipt->remaining : '' }}" class="form-control" readonly>
            <small id="remaining-warning"></small>
        </div>
    </div>
    <div class="col-md-6" id="panels-area">
        @if (isset($receipt))
            @foreach ($receipt->services as $service)
            <div id="{{ 'service-'.$service->id }}" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">{{ $service->name }}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">الوصف</label>
                            <input type="text" name="{{ $service->id . '|description' }}" value="{{ $service->pivot->description }}" class="form-control description" placeholder="ادخل الوصف">
                        </div>
                        <div class="form-group">
                            <label class="control-label">السعر</label>
                            <input type="number" name="{{ $service->id . '|price' }}" min="1" step="0.1" value="{{ $service->pivot->price }}" class="form-control price" placeholder="ادخل السعر">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
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
<script src="{{ asset('assets/js/receipts-services.js') }}" type="text/javascript"></script>
@endsection