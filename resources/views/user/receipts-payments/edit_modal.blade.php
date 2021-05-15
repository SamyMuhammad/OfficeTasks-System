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
                        <label class="control-label">المبلغ</label>
                        <input type="number" step="0.1" min="1" id="amount-input" name="amount" class="form-control" placeholder="ادخل المبلغ">
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
    function editPayment(itemId) {
        var update_route = "{{ properRoute('payments.update', ':id') }}";
        update_route = update_route.replace(':id', itemId);
        $('#edit-form-element').attr('action', update_route);

        var edit_route = "{{ properRoute('payments.edit', ':id') }}";
        edit_route = edit_route.replace(':id', itemId);
        $.ajax({
            url: edit_route,
            method: "GET",
            success: function(response) {
                if (response.status) {
                    $('#amount-input').val(response.amount);
                    $('#modal-button').click();
                }
            }
        });
    }
</script>
@endsection