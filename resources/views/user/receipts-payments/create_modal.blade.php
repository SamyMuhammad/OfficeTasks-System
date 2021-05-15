<div class="modal fade in" id="create-form" tabindex="-1" role="basic" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="form-title">دفع مستحق</h4>
            </div>
            <div class="modal-body">
                <form id="create-form-element" action="{{ properRoute('receipts.payments.store', $receipt->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">المبلغ</label>
                        <input type="number" step="0.1" min="1" name="amount" class="form-control" placeholder="ادخل المبلغ">
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