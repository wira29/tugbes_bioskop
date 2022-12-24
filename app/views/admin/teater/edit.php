<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center gap-3">
          <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
          <h2>Bioskop</h2>
        </header>
        <article class="container-fluid ">
          <article class="container-fluid ">
            <form class="needs-validation" novalidate action="/admin/teater/<?= $data['id'] ?>/update" method="POST" enctype="multipart/form-data">
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