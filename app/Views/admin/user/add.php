
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Add User</button>
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm">
            <div class="row">
                <div class="form-group col-6">
                    <label for="tendangnhap" class="col-form-label">Tên Đăng Nhập</label>
                    <input class="form-control" type="text" name="tendangnhap" id="tendangnhap">
                </div>
                <div class="form-group col-6">
                    <label for="matkhau" class="col-form-label">Mật Khẩu</label>
                    <input class="form-control" type="text" name="matkhau" id="matkhau">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="tenhienthi" class="col-form-label">Tên Hiển Thị</label>
                    <input class="form-control" type="email" name="tenhienthi" id="tenhienthi">
                </div>
                <div class="form-group col-6">
                    <label for="diachi" class="col-form-label">Địa Chỉ</label>
                    <input class="form-control" type="text" name="diachi" id="diachi">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="dienthoai" class="col-form-label">Điện Thoại</label>
                    <input class="form-control" type="text" name="dienthoai" id="dienthoai">
                </div>
                <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="bixoa" class="col-form-label">Bị Xóa</label>
                    <select name="bixoa" id="bixoa" class="form-control">
                        <option value="0">Chưa xóa</option>
                        <option value="1">Đã Xóa</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="loaitaikhoan" class="col-form-label">Loại Tài Khoản</label>
                    <select name="loaitaikhoan" id="loaitaikhoan" class="form-control">
                        <?php foreach (UserType::all() as $item): ?>
                        <option value="<?= $item->MaLoaiTaiKhoan ?>"><?= $item->TenLoaiTaiKhoan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="saveUser" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>