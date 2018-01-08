<div class="container">
    <div style="margin-top: 5%; text-align:center">
        <h1>Quản Lí Sản Phẩm</h1>
    </div>
    <div style="margin: 1% 0; text-align:right">
        <?php include('add.php') ?>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Đăng Nhập</th>
                <th>Tên Hiển Thị</th>
                <th>Điện Thoại</th>
                <th>Email</th>
                <th>Quyền</th>
                <th style="text-align:right">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(User::all() as $item):?>
            <tr>
                <th scope="row"><?= $item->MaTaiKhoan ?></th>
                <td><?= $item->TenDangNhap ?></td>
                <td><?= $item->TenHienThi ?></td>
                <td><?= $item->DienThoai ?></td>
                <td><?= $item->Email ?></td>
                <td>
                    <button onclick="editRole('<?= $item->MaTaiKhoan ?>')" data-toggle="modal" data-target="#myModal" class="btn btn-info">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <?= $item->TenLoaiTaiKhoan ?>
                    </button>
                </td>
                <td style="text-align:right">
                    <button class="btn btn-info show">Xem</button>&nbsp;
                    <button class="btn btn-warning edit">Sửa</button>&nbsp;
                    <button class="btn btn-danger remove">Xóa</button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Thay đổi quyền hạn</h4>
        </div>
        <div class="modal-body">
            <input id="idUser" type="text" value="" hidden>
            <select class="form-control" name="role" id="role">
            <?php foreach(UserType::all() as $item): ?>
                <option value="<?= $item->MaLoaiTaiKhoan ?>"><?= $item->TenLoaiTaiKhoan ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning" data-dismiss="modal">Thoát</button>
            <button id="saveRole" class="btn btn-info">Save</button>
        </div>
    </div>
  </div>
</div>
<script src="source/admin/js/user.js"></script>