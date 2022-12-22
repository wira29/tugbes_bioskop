<?php
  require_once __DIR__ . "/../../core/Helper.php";

  $uriHelper = new Helper();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="<?= $uriHelper->baseUrl('assets/css/style.css') ?>">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>

  <link rel="stylesheet" href="<?= $uriHelper->baseUrl('assets/css/bootstrap.min.css') ?>">
  <script src="<?= $uriHelper->baseUrl('assets/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="https://kit.fontawesome.com/75fbb137eb.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="bg-auth">
    <div class="col-md-4 col-sm-10">
      <div class="card card-auth">
        <div class="card-body p-5">
          <h1 class="title">Daftar</h1>
          <p>silakan masukkan data diri anda dengan benar</p>
          <div class="divider"></div>
          <div class="row mt-3">
            <div class="col-12 mt-5">
              <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="form-control" type="text" placeholder="Nama" name="email">
              </div>
            </div>
            <div class="col-12 mt-3">
              <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="form-control" type="text" placeholder="Email" name="email">
              </div>
            </div>
            <div class="col-12 mt-3">
              <div class="input-container">
                <i class="fa fa-phone icon"></i>
                <input class="form-control" type="text" placeholder="No Telepon" name="no_telp">
              </div>
            </div>
            <div class="col-12 mt-3">
              <div class="input-container">
                <i class="fa fa-lock icon"></i>
                <input class="form-control" type="text" placeholder="Password" name="email">
              </div>
            </div>
            <div class="col-12 mt-3">
              <div class="input-container">
                <i class="fa fa-lock icon"></i>
                <input class="form-control" type="text" placeholder="Ulangi Password" name="email">
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="d-grid gap-2">
              <button class="btn btn-auth" type="button">Daftar</button>
            </div>
            <div class="col-12 footer mt-5">
              <p>sudah punya akun ? <a href="/admin/user" class="btn-link">Masuk</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>