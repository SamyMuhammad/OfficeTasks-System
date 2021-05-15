<div class="modal fade in" id="edit-form" tabindex="-1" role="basic" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="form-title"></h4>
            </div>
            <div class="modal-body">
                <form id="edit-form-element" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group" id="fields-container">
                        <label class="control-label">القيمة</label>
                        <input type="text" id="value-input" name="value" class="form-control" placeholder="ادخل القيمة">
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
        var update_route = "{{ route('admin.settings.update', ':id') }}";
        update_route = update_route.replace(':id', itemId);
        $('#edit-form-element').attr('action', update_route);

        var edit_route = "{{ route('admin.settings.edit', ':id') }}";
        edit_route = edit_route.replace(':id', itemId);
        $.ajax({
            url: edit_route,
            method: "GET",
            success: function(response) {
                if (response.status) {
                    if (response.body.slug === 'logo') {
                        $('#value-input').attr('type', 'file');
                        // $('#fields-container').append("<small>يجب ألا يتجاوز ارتفاع الصورة 160 بيكسل، وألا يتجاوز عرضها 500 بيكسل.</small>");
                    }else{
                        $('#value-input').attr('type', 'text');
                        $('#value-input').val(response.body.value);
                    }
                    $('#modal-button').click();  
                }
            }
        });
    }
</script>
@endsection