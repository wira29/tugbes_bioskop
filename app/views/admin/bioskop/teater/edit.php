<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex flex-column justify-items-center gap-3">
          <div>
            <a href="/admin/bioskop/<?= $data['id_bioskop'] ?>/edit" class="me-3 btn btn-warning"><span><i class="fa fa-arrow-left me-2"></i></span>Kembali</a>
          </div>
          <div class="d-flex align-items-center gap-3">
            <a class="text-theme-primary " data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Teater</h2>
          </div>
        </header>
        <article class="container-fluid ">
          <article class="container-fluid ">
            <form class="needs-validation" novalidate action="/teater/<?= $data['id'] ?>/update" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <input type="text" class="form-control" name="id_bioskop" value="<?= $data['id_bioskop'] ?>" id="nama_teater" required hidden>
                <label for="nama_teater" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_teater" value="<?= $data['nama_teater'] ?>" id="nama" required>
                <div class="invalid-feedback">
                  Nama bioskop belum terisi!
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </article>
        </article>
      </main>
    </div>
  </div>
</body>

</html>