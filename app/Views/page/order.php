<div style="margin: 10% 0"></div>
<form action="#" class="form-group" ></form>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Đặt Hàng</h2>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Họ tên</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Họ tên" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Email</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="email" id="email" name="email" placeholder="email" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="gioitinh">Giới tính</label>
                </div>
                <div class="col-md-9 row">
                    <div class="col-md-6 row">
                        <label class="col-md-6" for="nam">Nam</label>
                        <input class="col-md-6 radio" type="radio" name="gioitinh" id="nam">
                    </div>
                    <div class="col-md-6 row">
                        <label class="col-md-6" for="nam">Nữ</label>
                        <input class="col-md-6 radio" type="radio" name="gioitinh" id="nu">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Địa chỉ</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="diachi" name="diachi" placeholder="địa chỉ" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Điện thoại</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="dienthoai" name="dienthoai" placeholder="điện thoại" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Ghi chú</label>
                </div>
                <div class="col-md-9">
                    <textarea class="form-control" id="notes" name="note" placeholder="Ghi chú"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Hình thức thanh toán</label>
                </div>
                <div class="col-md-9">
                    <ul  class="nav nav-pills">
                        <li class="active">
                            <a  href="#1b" data-toggle="tab">COD</a>
                        </li>
                        <li>
                            <a href="#2b" data-toggle="tab">ATM</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php if(Session::has('cart')): ?>
                <input id="checkout" type="submit" value="Đặt Hàng" class="btn btn-info">
            <?php else: ?>
                <input id="checkout" type="submit" value="Đặt Hàng" class="btn btn-info" disabled>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <div class="container">
                <h2>Chi Tiết Đơn Hàng</h2>
                <div id="ordered-item">
                <?php if(Session::has('cart')): ?>
                    <div class="row">
                        <?php foreach(Session::get('cart')->items as $item):?>
                        <div class="col-md-4">
                            <div class=" ordered-cart thumbnail">
                                <a class= "x-cart" onclick="removeOrderedItem(<?= $item['item']->MaSP ?>)" href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <a href="<?= route('page','detail',$item['item']->MaSP) ?>" target="_blank">
                                    <img src="source/img/product/<?= str_replace(' ','',$item['item']->TenSP) ?>/cover/<?= $item['item']->HinhSP ?>" alt="Lights" height="100" style="width:100%">
                                    <div class="caption">
                                        <p class="text-animate">Giá: <?= $item['item']->GiaSP ?> x<?= $item['qty'] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <h4 id="ordered-price">Tổng tiền: <?= Session::get('cart')->totalPrice ?></h4>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

