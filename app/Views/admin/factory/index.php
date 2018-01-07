<div class="container">
    <div style="margin-top: 5%; text-align:center">
        <h1>Quản Lí Hãng Sản Xuất</h1>
    </div>
    <div style="margin: 1% 0; text-align:right">
        <?php include('add.php') ?>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Logo</th>
            <th style="text-align:right">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach(Factory::all() as $item):?>
            <tr>
                <th scope="row"><?= $item->MaHangSX ?></th>
                <td><?= $item->TenHangSX ?></td>
                <td><?= $item->HinhHangSX ?></td>
                <td style="text-align:right">
                    <button onclick="load(<?= $item->MaHangSX ?>,'<?= $item->TenHangSX ?>')" class="btn btn-warning">Sửa</button>
                    <button onclick="remove(<?= $item->MaHangSX ?>)" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<script src="source/admin/js/factory.js"></script>