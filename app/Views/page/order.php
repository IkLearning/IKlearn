<div style="margin: 10% 0">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php if(!Session::has('auth')): ?>
            <form id="formDangky" action="<?= route('auth','save') ?>" class="form-group" >
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
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="email" id="email" name="email" placeholder="email" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="ngaysinh">Ngày sinh</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="date" name="ngaysinh" id="ngaysinh">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="diachi">Địa chỉ</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="diachi" name="diachi" placeholder="địa chỉ" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="dienthoai">Điện thoại</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="dienthoai" name="dienthoai" placeholder="điện thoại" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="tendangnhap">Tên đăng nhập</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="tendangnhap" name="tendangnhap" placeholder="Tên đăng nhập">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="matkhau">Mật khẩu</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="password" id="matkhau" name="matkhau" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="matkhau">Nhập lại mật khẩu</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="password" id="nhaplaimatkhau" name="matkhau" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="name">Mã xác nhận</label>
                    </div>
                    <div class="col-md-9 row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="captcha" id="captcha">
                        </div>
                        <div class="col-md-7">
                            <img id="captchaImage" src="source/captcha/bj.jpg" width="100" alt="k thể tải captcha">
                            <a href="javascript:;"><img id="reload" src="source/captcha/reload.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Đăng ký" class="btn btn-outline-info">
            </form>
            <form id="formDangNhap" action="<?= route('auth','login') ?>" class="form-group">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="login-username">Tài khoản</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="login-username" name="login-username" placeholder="Tài khoản" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="login-password">Mật khẩu</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="password" id="login-password" name="login-password" placeholder="Mật khẩu" required>
                    </div>
                </div>
                <input class="btn btn-outline-info" type="button" value="Đăng nhập">
            </form>
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
                    <?php if(Session::has('cart')): ?>
                        <input id="checkout" type="submit" value="Đặt hàng" class="btn btn-outline-info">
                    <?php else: ?>
                        <input id="checkout" type="submit" value="Đặt hàng" class="btn btn-outline-info" disabled>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

