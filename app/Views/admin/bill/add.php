<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
<div role="document" class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Chỉnh sửa tình trạng</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form>
            <input id="billID" type="text" value="" hidden>
            <div class="form-group">
                <label class="col-form-label">Tình Trạng</label>
                <select class="form-control" name="tinhtrang" id="tinhtrang">
                    <?php foreach(BillState::all() as $key => $item): ?>
                    <option value="<?= $item->MaTinhTrang ?>" <?= $key==0?'selected':'' ?>><?= $item->TenTinhTrang ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-warning">Close</button>
        <button id="saveBillState" type="button" class="btn btn-primary">Save</button>
    </div>
    </div>
</div>
</div>