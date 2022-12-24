<?php
require_once __DIR__ . "/layouts/navbar.php";
?>

<div class="container mt-5">
  <h3 class="fw-bold">Edit Profile</h3>

  <form action="<?= $uriHelper->baseUrl('processUpdateProfile') ?>" method="POST" enctype="multipart/form-data">
    <div class="row mt-5">
      <div class="col-md-6 mt-3">
        <label for="">Nama</label>
        <input type="text" class="form-control mt-3" name="nama" placeholder="John Doe" value="<?= $data['nama'] ?>">
      </div>
      <div class="col-md-6 mt-3">
        <label for="">Email</label>
        <input type="text" class="form-control mt-3" name="email" placeholder="john@gmail.com" value="<?= $data['email'] ?>">
      </div>
      <div class="col-md-6 mt-3">
        <label for="">No Telepon</label>
        <input type="text" class="form-control mt-3" name="no_telepon" placeholder="081324xxxxxx" value="<?= $data['no_telepon'] ?>">
      </div>
      <div class="col-md-6 mt-3">
        <label for="">Foto</label>
        <input type="file" name="foto" accept="image/*" class="form-control mt-3" placeholder="John Doe">
      </div>
      <div class="col-12 mt-5 text-end">
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </div>
  </form>
</div>

<?php
require_once __DIR__ . "/layouts/footer.php";
?>