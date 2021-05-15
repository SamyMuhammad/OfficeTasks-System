<div class="modal fade in" id="create-form" tabindex="-1" role="basic" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="form-title">إضافة</h4>
            </div>
            <div class="modal-body">
                <form id="create-form-element" action="{{ route('admin.payment-methods.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">الاسم</label>
                        <input type="text" name="name" class="form-control" placeholder="ادخل الاسم">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="create-form-element" class="btn green">حفظ</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade in" id="edit-form" tabindex="-1" role="basic" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="form-title">تعديل</h4>
            </div>
            <div class="modal-body">
                <form id="edit-form-element" action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label class="control-label">الاسم</label>
                        <input type="text" id="name-input" name="name" class="form-control" placeholder="ادخل الاسم">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="edit-form-element" class="btn green">حفظ</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<a class="btn btn-primary" id="modal-button" href="#edit-form" style="display: none" data-toggle="modal"></a>
@section('extra-js')
<script>
    function editCategory(itemId) {
        var update_route = "{{ route('admin.payment-methods.update', ':id') }}";
        update_route = update_route.replace(':id', itemId);
        $('#edit-form-element').attr('action', update_route);

        var edit_route = "{{ route('admin.payment-methods.edit', ':id') }}";
        edit_route = edit_route.replace(':id', itemId);
        $.ajax({
            url: edit_route,
            method: "GET",
            success: function(response) {
                if (response.status) {
                    $('#name-input').val(response.name);
                    $('#modal-button').click();  
                }
            }
        });
    }
</script>
@endsection