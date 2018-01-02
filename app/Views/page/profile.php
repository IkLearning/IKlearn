<link rel="stylesheet" href="source/css/profile.css">
<aside class="profile-card">
  <header>
    <!-- here’s the avatar -->
    <a target="_blank" href="https://www.facebook.com/Gack113">
      <img src="source/img/layout/profile.png" class="hoverZoomLink">
    </a>

    <!-- the username -->
    <h1><?= Session::get('auth')->displayName ?></h1>

    <!-- and role or location -->
    <h2><?= Session::get('auth')->roleName ?></h2>

  </header>

  <!-- bit of a bio; who are you? -->
  <div class="profile-bio">
    <p>
      Welcome To Our Website
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
      <a target="_blank" href="https://twitter.com/kugack">
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
</aside>