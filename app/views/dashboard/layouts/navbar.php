<?php
require_once __DIR__ . "/./app.php";

$url = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?= $uriHelper->baseUrl('home') ?>">
      <img src="<?= $uriHelper->baseUrl('assets/img/tba-white.png') ?>" width="100" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex flex-row justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav py-2">
        <a class="nav-link me-3 <?= ($url == "home") ? 'active' : '' ?>" aria-current="page" href="<?= $uriHelper->baseUrl('home') ?>">Beranda</a>
        <a class="nav-link me-3 <?= ($url == "film") ? 'active' : '' ?>" href="<?= $uriHelper->baseUrl('film') ?>">Film</a>
        <a class="nav-link me-3" href="<?= $uriHelper->baseUrl('home#bantuan') ?>">Bantuan</a>
        <?php if (!isset($_SESSION['user'])) { ?>
          <a class="nav-link btn btn-login" href="<?= $uriHelper->baseUrl('login') ?>">Masuk</a>
        <?php } else { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['user']->nama ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= $uriHelper->baseUrl('profile') ?>">Profil</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= $uriHelper->baseUrl('logout') ?>">Keluar</a></li>
            </ul>
          </li>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>