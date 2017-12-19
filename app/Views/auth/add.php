
<button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#signUpModal">Đăng Ký</button>
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tài khoản mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 id="message"></h4>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <label for="tendangnhap" class="label-custom">Tên Đăng Nhập</label>
                    <input type="text" name="tendangnhap" id="tendangnhap">
                </div>
                <div class="col-md-6">
                    <label for="tenhienthi" class="label-custom">Tên Hiển Thị</label>
                    <input type="text" name="tenhienthi" id="tenhienthi">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="matkhau" class="label-custom">Mật Khẩu</label>
                    <input type="password" name="matkhau" id="matkhau">
                </div>
                <div class="col-md-6">
                    <label for="nhaplaimatkhau" class="label-custom">Nhập Lại Mật Khẩu</label>
                    <input type="password" name="nhaplaimatkhau" id="nhaplaimatkhau">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="diachi" class="label-custom">Địa Chỉ</label>
                    <input type="text" name="diachi" id="diachi">
                </div>
                <div class="col-md-6">
                    <label for="dienthoai" class="label-custom">Điện Thoại</label>
                    <input type="text" name="dienthoai" id="dienthoai">
                </div>
            </div>
                <div class="col-md-6">
                    <label for="email" class="label-custom">Email</label>
                    <input type="email" name="email" id="email">
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Thoát</button>
        <button id="signUp" type="button" class="btn btn-primary">Đăng ký</button>
      </div>
    </div>
  </div>
</div>