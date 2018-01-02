<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <div class="sidenav-header-inner text-center"><img src="source/img/product/aatrox/thumbnail/aatrox.png" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5 text-uppercase"><?= Session::get('auth')->displayName ?></h2><span class="text-uppercase"><?= Session::get('auth')->roleName ?></span>
      </div>
      <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>L</strong><strong class="text-primary">N</strong><strong>L</strong></a></div>
    </div>
    <div class="main-menu">
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li class="active"><a href="<?= route('admin','index') ?>"> <i class="icon-home"></i><span>Home</span></a></li>
      </ul>
    </div>
    <div class="admin-menu">
      <ul id="side-admin-menu" class="side-menu list-unstyled"> 
        <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Quản Lí</span>
            <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
          <ul id="pages-nav-list" class="collapse list-unstyled">
            <li> <a href="<?= route('admin','products') ?>">Sản Phẩm</a></li>
            <li> <a href="<?= route('admin','producttypes') ?>">Loại Sản Phẩm</a></li>
            <li> <a href="<?= route('admin','factories') ?>">Hãng Sản Xuất</a></li>
            <li> <a href="<?= route('admin','users') ?>">Tài Khoản</a></li>
            <li> <a href="<?= route('admin','usertypes') ?>">Loại Tài Khoản</a></li>
            <li> <a href="<?= route('admin','bills') ?>">Đơn Đặt Hàng</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>