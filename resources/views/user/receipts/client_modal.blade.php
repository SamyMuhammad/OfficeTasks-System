<div class="modal fade in" id="create-client" tabindex="-1" role="basic" aria-hidden="true" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="form-title">إضافة عميل</h4>
            </div>
            <div class="modal-body">
                <form id="create-client-form" action="{{ routeIsAdmin() ? route('admin.clients.store') : route('receipts.clients.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">الاسم</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="ادخل الاسم">
                    </div>
                    <div class="form-group">
                        <label class="control-label">الهاتف</label>
                        <div class="input-icon">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="form-control" placeholder="ادخل الهاتف">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="create-client-form" class="btn green">حفظ</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>