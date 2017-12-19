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
                <th>Thao Tác</th>
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
                <td style="text-align:right">
                    <button onclick="showUser(<?= $item->MaTaiKhoan ?>)" id="xem" class="btn btn-info">Xem</button>&nbsp;
                    <button onclick="editUser(<?= $item->MaTaiKhoan ?>)" id="sua" class="btn btn-warning">Sửa</button>&nbsp;
                    <button onclick="deleteUser(<?= $item->MaTaiKhoan ?>)" id="xoa" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<script src="../../app/public/source/admin/js/user.js"></script>