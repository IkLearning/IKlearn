<link rel="stylesheet" href="source/css/profile.css">
<aside class="profile-card">
  <header>
    <!-- here’s the avatar -->
    <a target="_blank" href="<?= route('page','profile') ?>">
      <img src="source/img/layout/profile.png" class="hoverZoomLink">
    </a>

    <!-- the username -->
    <h1><?= Session::get('auth')->displayName ?></h1>

    <!-- and role or location -->
    <h2><?= Session::get('auth')->roleName ?></h2>

  </header>

  <?php $item = User::find(Session::get('auth')->id) ?>
  <div class="profile-bio">
    <p>
      Địa chỉ: <?= $item->DiaChi ?>
      <br>
      Liên hệ: <?= $item->DienThoai?>
      <br>
      Email: <?= $item->Email?>
    </p>
  </div>

  <ul class="profile-social-links">
    <li>
      <a target="_blank" href="https://www.facebook.com/Gack113">
        <i class="fa fa-facebook"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://twitter.com/Gack113">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://github.com/Gack113">
        <i class="fa fa-github"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://www.instagram.com/ln_gach">
        <i class="fa fa-instagram"></i>
      </a>
    </li>
  </ul>
  <div class="container row">
    <div class="col-6">
      <a href="<?=route('auth','logout') ?>"><i class="fa fa-home"></i>Trang chủ</a>
    </div>
    <div class="col-6">
      <a href="<?=route('auth','logout') ?>"><i class="fa fa-sign-out"></i>Đăng xuất</a>
    </div>
  </div>
</aside>