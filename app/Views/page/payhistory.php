<div class="container">
    <div style="margin-top: 10%; text-align:center">
        <h1>Lịch Sử Thanh Toán</h1>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Ngày Lập</th>
                <th>Tổng Thành Tiền</th>
                <th>Mã Tài Khoản</th>
                <th>Tình Trạng</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach(Bill::getByUserID(Session::get('auth')->id) as $item):?>
            <tr>
                <th scope="row"><?= $item->MaHD ?></th>
                <td><?= $item->NgayLap ?></td>
                <td><?= $item->TongTien ?></td>
                <td><?= $item->MaTK ?></td>
                <td>
                    <span>
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <?= $item->TenTinhTrang ?>
                    </span>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

