<?php $this->view('admin/layouts/header') ?>


<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex flex-column justify-items-center gap-3">
          <div>
            <a href="<?= Helper::baseUrl('admin/bioskop') ?>" class="me-3 btn btn-warning"><span><i class="fa fa-arrow-left me-2"></i></span>Kembali</a>
          </div>
          <div class="d-flex align-items-center gap-3">
            <a class="text-theme-primary " data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Bioskop</h2>
          </div>
        </header>
        <article class="container-fluid ">
          <form class="needs-validation" novalidate action="<?= Helper::baseUrl('bioskop') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" required>
              <div class="invalid-feedback">
                Nama bioskop belum terisi!
              </div>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required></textarea>
              <div class="invalid-feedback">
                Alamat bioskop belum terisi!
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
  </script>
</body>

</html>