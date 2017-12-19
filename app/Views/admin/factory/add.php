<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><span><i class="fa fa-plus" aria-hidden="true"></i> Factory</span></button>
<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
<div role="document" class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Thêm mới hãng sản xuất</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form>
            <div class="form-group">
                <label class="col-form-label">Tên</label>
                <input type="text" placeholder="Nhập tên hãng" class="form-control" id="ten">
            </div>
            <div class="form-group" id="previewImage">
                <label class="col-form-label">Logo</label>
                <input type="file" placeholder="Nhập tên loại" class="form-control" id="featureImage">
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-warning">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
    </div>
    </div>
</div>
</div>