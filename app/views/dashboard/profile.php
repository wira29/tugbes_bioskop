<?php
require_once __DIR__ . "/layouts/navbar.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-4 text-end">
      <img src="<?= $uriHelper->baseUrl('assets/img/user/' . $_SESSION['user']->foto) ?>" width="200" height="200" class="rounded-circle" alt="">
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-center">
      <h3 class="fw-bold"><?= $_SESSION['user']->nama ?></h3>
      <p class="my-1"><?= $_SESSION['user']->no_telepon ?></p>
      <p><?= $_SESSION['user']->email ?></p>
    </div>
  </div>

  <div class="row justify-content-center mt-5">
    <div class="col-md-8 p-3 container-menu" style="background-color: #343438;">
      <ul>
        <a href="<?= $uriHelper->baseUrl('updateProfile') ?>">
          <li>Update Profile</li>
        </a>
        <a href="<?= $uriHelper->baseUrl('transaksi') ?>">
          <li>Transaksi</li>
        </a>
        <a href="">
          <li>Kontak Kami</li>
        </a>
        <a href="<?= $uriHelper->baseUrl('logout') ?>">
          <li>Keluar</li>
        </a>
      </ul>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . "/layouts/footer.php";
?>