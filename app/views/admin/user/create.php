<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex flex-column justify-items-center gap-3">
          <div>
            <a href="<?= Helper::baseUrl() ?>admin/user" class="me-3 btn btn-warning"><span><i class="fa fa-arrow-left me-2"></i></span>Kembali</a>
          </div>
          <div class="d-flex align-items-center gap-3">
            <a class="text-theme-primary" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>User</h2>
          </div>
        </header>
        <article class="container-fluid ">
          <form class="needs-validation" novalidate action="<?= Helper::baseUrl() ?>user" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" required>
              <div class="invalid-feedback">
                Nama pengguna belum terisi!
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
              <div class="invalid-feedback">
                Email pengguna belum terisi atau tidak valid!
              </div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required min="6">
              <div class="invalid-feedback">
                Password pengguna belum terisi!
              </div>
            </div>
            <div class="mb-3">
              <label for="no-telepon" class="form-label">No Telepon</label>
              <input type="text" class="form-control" name="no_telepon" id="no-telepon" required pattern="[0-9]+" title="please enter number only">
              <div class="invalid-feedback">
                Nomor Telepon pengguna belum terisi atau tidak valid!
              </div>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Role</label>
              <select class="form-select" name="id_role" required>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select>
            </div>
            <div class="mb-3">
              <div class="mb-3">
                <label for="foto" class="form-label">Foto Pengguna</label>
                <input class="form-control" type="file" id="foto" name="foto" required>
                <img class="img-thumbnail" width="400" accept="image/*" src="" id="foto-preview">
                <div class="invalid-feedback">
                  Foto pengguna belum terisi!
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </article>
      </main>
    </div>
  </div>

  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    const fotoInput = document.querySelector('#foto');
    const fotoPreview = document.querySelector('#foto-preview');

    fotoInput.onchange = evt => {
      const [file] = fotoInput.files
      if (file) {
        fotoPreview.src = URL.createObjectURL(file)
      }
    }
  </script>
</body>

</html>