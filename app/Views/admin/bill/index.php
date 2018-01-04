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
            <tr id="hd<?= $item->MaHD ?>">
                <th scope="row"><?= $item->MaHD ?></th>
                <td><?= $item->NgayLap ?></td>
                <td><?= $item->TongTien ?></td>
                <td><?= $item->MaTK ?></td>
                <td>
                    <button class="btn btn-info">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <?= $item->TenTinhTrang ?>
                    </button>
                </td>
                <td style="text-align:center">
                    <button onclick="showBill(<?= $item->MaHD ?>)" id="xem" class="btn btn-info">Xem</button>&nbsp;
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>