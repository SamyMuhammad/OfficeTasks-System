@section('page-style-plugins')
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<div class="row form-body">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">الاسم</label>
            <input type="text" name="name" value="{{ isset($user) ? $user->name : old('name') }}" class="form-control"
                placeholder="ادخل الاسم">
        </div>
        <div class="form-group">
            <label class="control-label">الهاتف</label>
            <div class="input-icon">
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" value="{{ isset($user) ? $user->phone : old('phone') }}"
                    class="form-control" placeholder="ادخل الهاتف">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">البريد الإلكتروني</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <input type="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}"
                    class="form-control" placeholder="البريد الإلكتروني"> </div>
        </div>
        <div class="form-group">
            <label class="control-label">الراتب</label>
            <input type="number" min="1" name="salary" value="{{ isset($user) ? $user->salary : old('salary') }}" class="form-control"
                placeholder="ادخل الراتب">
        </div>
        <div class="form-group">
            <label class="control-label">القسم</label>
            <select name="category_id" class="form-control select2" data-placeholder="اختر القسم">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ isset($user) && (optional($user->category)->id == $category->id) ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
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
        @if (isset($user))
        @include('admin.includes.permissions_form', ['roles' => $roles, 'item' => $user])
        @else
        @include('admin.includes.permissions_form', ['roles' => $roles])
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
<script src="{{ asset('assets/js/permissions.js') }}"></script>
@endsection