<link rel="stylesheet" href="source/css/profile.css">
<aside class="profile-card">
  <header>
    <!-- here’s the avatar -->
    <a target="_blank" href="<?= route('page','profile') ?>">
      <img src="source/img/layout/profile.png" class="hoverZoomLink">
    </a>

    <!-- the username -->
    <h1 id="user-name"><?= Session::get('auth')->displayName ?></h1>

    <!-- and role or location -->
    <h2><?= Session::get('auth')->roleName ?></h2>

  </header>

  <!-- bit of a bio; who are you? -->
  <?php $item = User::find(Session::get('auth')->id) ?>
  <div class="profile-bio">
    <p>
      Địa chỉ: <span id="user-address"><?= $item->DiaChi ?></span>
      <br>
      Liên hệ: <span id="user-phone"><?= $item->DienThoai?></span>
      <br>
      Email: <span id="user-email"><?= $item->Email?></span>
    </p>
  </div>

  <!-- some social links to show off -->
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
    <div class="col-4">
      <a style="float:right" href="<?=route('page','index') ?>"><i class="fa fa-home"></i>Trang chủ</a>
    </div>
    <div class="col-4">
      <a style="float:right" href="<?=route('auth','logout') ?>"><i class="fa fa-sign-out"></i>Đăng xuất</a>
    </div>
    <div class="col-4">
      <a href="#" id="loadForm" data-toggle="modal" data-target="#userModal">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        Sửa thông tin
      </a>
    </div>
  </div>
</aside>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm">
            <input type="text" name="id" id="id" hidden value="<?= Session::get('auth')->id ?>">
            <div class="row">
                <div class="form-group col-6">
                    <label for="tenhienthi" class="col-form-label">Tên Hiển Thị</label>
                    <input class="form-control" type="email" name="tenhienthi" id="tenhienthi">
                </div>
                <div class="form-group col-6">
                    <label for="diachi" class="col-form-label">Địa Chỉ</label>
                    <input class="form-control" type="text" name="diachi" id="diachi">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="dienthoai" class="col-form-label">Điện Thoại</label>
                    <input class="form-control" type="text" name="dienthoai" id="dienthoai">
                </div>
                <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button id="saveUser" type="button" class="btn btn-info">Save</button>
      </div>
    </div>
  </div>
</div>
