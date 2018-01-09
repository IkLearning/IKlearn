<div class="container">
<div style="margin-top: 5%; text-align:center">
    <h1>Quản Lí Hóa Đơn</h1>
</div>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Ngày Lập</th>
            <th>Tổng Thành Tiền</th>
            <th>Mã Tài Khoản</th>
            <th>Tình Trạng</th>
            <th style="text-align:center">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach(Bill::all() as $item):?>
        <tr>
            <th scope="row"><?= $item->MaHD ?></th>
            <td><?= $item->NgayLap ?></td>
            <td><?= $item->TongTien ?></td>
            <td><?= $item->MaTK ?></td>
            <td>
                <button onclick="editState('<?= $item->MaHD ?>')" data-toggle="modal" data-target="#myModal" class="btn btn-info">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <?= $item->TenTinhTrang ?>
                </button>
            </td>
            <td style="text-align:center">
                <button class="btn btn-info show">Xem</button>&nbsp;
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</div>

<?php include('add.php'); ?>
<?php include('show.php'); ?>
<script src="source/admin/js/bill.js"></script>