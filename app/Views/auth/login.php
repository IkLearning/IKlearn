<?php
session_start();
if(isset($_SESSION['auth']))
  header("location:../admin");
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng Nhập Tài Khoản</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../../app/public/source/admin/css/style.default.css" id="theme-stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner" id="loginBox">
            <div class="logo text-uppercase"><strong class="text-primary">Đăng Nhập</strong><strong><span class="text-info">Tài Khoản</span></strong></div>
            <form id="login-form" method="post">
              <div class="form-group">
                <label for="login-username" class="label-custom">Tài Khoản</label>
                <input id="login-username" type="text" name="loginUsername" required="Vui lòng nhập tên tài khoản">
              </div>
              <div class="form-group">
                <label for="login-password" class="label-custom">Mật Khẩu</label>
                <input id="login-password" type="password" name="loginPassword" required="Vui lòng nhập mật khẩu">
              </div>
            </form>
            <button id="login" class="btn btn-primary">Đăng Nhập</button>
            <a href="#" class="forgot-pass">Quên Mật Khẩu?</a>
            <?php include('add.php') ?>
            <div style="min-height:50px"></div>
            <div class="alert alert-danger" role="alert" id="error" hidden>
              Invalid username or password
            </div>
          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="../../app/public/source/admin/js/front.js"></script>
    <script src="../../app/public/source/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../app/public/source/admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../../app/public/source/admin/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="../../app/public/source/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="../../app/public/source/js/auth.js"></script>
  </body>
</html>