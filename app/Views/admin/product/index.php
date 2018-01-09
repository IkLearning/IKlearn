<div class="container">
    <div style="margin-top: 5%; text-align:center">
        <h1>Quản Lí Sản Phẩm</h1>
    </div>
    <div style="margin: 1% 0; text-align:right">
        <?php include('add.php') ?>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hình</th>
                <th>Mô Tả</th>
                <th style="text-align:center">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach(Product::all() as $item):?>
            <tr id="sp<?= $item->MaSP ?>">
                <th scope="row"><?= $item->MaSP ?></th>
                <td><?= $item->TenSP ?></td>
                <td><?= $item->GiaSP ?></td>
                <td><?= $item->HinhSP ?></td>
                <td><?= substr($item->MoTa,0,50)?>..</td>
                <td style="text-align:right">
                    <button onclick="showProduct(<?= $item->MaSP ?>)" id="xem" class="btn btn-info">Xem</button>&nbsp;
                    <button onclick="editProduct(<?= $item->MaSP ?>)" id="sua" class="btn btn-warning">Sửa</button>&nbsp;
                    <button onclick="deleteProduct(<?= $item->MaSP ?>)" id="xoa" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="../../app/public/source/admin/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../app/public/source/admin/plugin/tinymce/init-tinymce.js"></script>
<script src="../../app/public/source/admin/js/product.js"></script>