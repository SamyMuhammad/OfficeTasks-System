<div class="row form-body">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">الاسم</label>
            <input type="text" name="name" value="{{ isset($client) ? $client->name : old('name') }}" class="form-control"
                placeholder="ادخل الاسم">
        </div>
        <div class="form-group">
            <label class="control-label">الهاتف</label>
            <div class="input-icon">
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" value="{{ isset($client) ? $client->phone : old('phone') }}"
                    class="form-control" placeholder="ادخل الهاتف">
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn green">حفظ</button>
</div>