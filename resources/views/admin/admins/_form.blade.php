<div class="row form-body">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">الاسم</label>
            <input type="text" name="name" value="{{ isset($admin) ? $admin->name : old('name') }}" class="form-control"
                placeholder="ادخل الاسم">
        </div>
        <div class="form-group">
            <label class="control-label">الهاتف</label>
            <div class="input-icon">
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" value="{{ isset($admin) ? $admin->phone : old('phone') }}"
                    class="form-control" placeholder="ادخل الهاتف">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">البريد الإلكتروني</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <input type="email" name="email" value="{{ isset($admin) ? $admin->email : old('email') }}"
                    class="form-control" placeholder="البريد الإلكتروني"> </div>
        </div>
        <div class="form-group">
            <label class="control-label">كلمة المرور</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
            </div>
            @if (request()->routeIs('admin.admin.edit'))
            <span class="help-block">اتركه فارغاً في حالة عدم الرغبة في تغيير كلمة المرور.</span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label">أعد إدخال كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="كلمة المرور">
        </div>
    </div>
    {{-- Permissions --}}
    <div class="col-md-6" style="font-size: 17px;">
        @if (isset($admin))
        @include('admin.includes.permissions_form', ['roles' => $roles, 'item' => $admin])
        @else
        @include('admin.includes.permissions_form', ['roles' => $roles])
        @endif
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn green">حفظ</button>
</div>

@section('page-level-scripts')
    <script src="{{ asset('assets/js/permissions.js') }}"></script>
@endsection