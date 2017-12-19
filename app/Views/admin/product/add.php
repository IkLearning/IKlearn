
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal"><span><i class="fa fa-plus" aria-hidden="true"></i> Champion</span></button>
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tài khoản mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm">
            <input type="text" id="ma" hidden>
            <input type="text" id="ngaynhap" hidden>
            <div class="row">
                <div class="form-group col-6">
                    <label for="ten" class="col-form-label">Tên</label>
                    <input class="form-control" type="text" name="name" id="ten">
                </div>
                <div class="form-group col-6">
                    <label for="gia" class="col-form-label">Giá</label>
                    <input class="form-control" name="gia" id="gia">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="loai" class="col-form-label">Loại</label>
                    <select name="loai" id="loai" class="form-control">
                        <?php foreach (ProductType::all() as $item): ?>
                           <option value="<?= $item->MaLoaiSP ?>"><?= $item->TenLoaiSP ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="nsx" class="col-form-label">Hãng Sản Xuất</label>
                    <select name="hang" id="hang" class="form-control">
                        <?php foreach (Factory::all() as $item): ?>
                           <option value="<?= $item->MaHangSX ?>"><?= $item->TenHangSX ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="soluongton" class="col-form-label">Số Lượng Tồn</label>
                    <input class="form-control" type="text" name="soluongton" id="soluongton">
                </div>
                <div class="form-group col-6">
                    <label for="soluongban" class="col-form-label">Số Lượng Bán</label>
                    <input class="form-control" type="text" name="soluongban" id="soluongban">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="bixoa" class="col-form-label">Bị Xóa</label>
                    <select id="bixoa" class="form-control">
                        <option value="0">Chưa Xóa</option>
                        <option value="1">Đã Xóa</option>
                    </select>
                </div>
                <div class="form-group col-6" id="previewImage">
                    <label for="file" class="col-form-label">Image</label>
                    <input class="form-control" type="file" name="featureImage" id="featureImage">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="mota" class="col-form-label">Mô Tả</label>
                    <textarea class="form-control" name="mota" id="mota" cols="30" rows="3"></textarea>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveProduct">Save</button>
      </div>
    </div>
  </div>
</div>