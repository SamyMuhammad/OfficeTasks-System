<h3>الصلاحيات</h3>
<div class="md-checkbox">
    <input type="checkbox" id="select_all" class="md-check">
    <label for="select_all">
        <span class="inc"></span>
        <span class="check"></span>
        <span class="box"></span>تحديد الكل</label>
</div>

@foreach($roles as $role)
<hr class="mt-0">
<div class="form-group form-md-checkboxes">
    <div class="md-checkbox">
        <input type="checkbox" name="roles[]" id="checkbox{{ $role->name }}" value="{{$role->name}}"
            class="md-check select_role" data-parent="{{$role->name}}"
            {{ isset($item) && $item->hasRole($role->name) ? 'checked' : null }}>
        <label for="checkbox{{$role->name}}" class="label-role">
            <span class="inc"></span>
            <span class="check"></span>
            <span class="box"></span> {{ $role->ar_name }}</label>
    </div>

    {{-- <hr> --}}
    <div class="md-checkbox-inline">
        @foreach($role->permissions as $permission)
        <div class="md-checkbox">
            <input type="checkbox" name="permissions[]" id="checkbox{{ $permission->name }}" value="{{ $permission->name }}"
                class="md-check permission-checkbox"
                {{ isset($item) && $item->hasPermissionTo($permission->name) ? 'checked' : null }}
                data-parent="{{ $role->name }}">
            <label for="checkbox{{ $permission->name }}">
                <span class="inc"></span>
                <span class="check"></span>
                <span class="box"></span> {{ $permission->ar_name }}
            </label>
        </div>
        @endforeach
    </div>
</div>
@endforeach