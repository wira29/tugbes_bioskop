<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center gap-3">
          <a href="/admin/bioskop/<?= $data['id_bioskop'] ?>/edit" class="me-3 btn btn-warning"><span><i class="fa fa-arrow-left me-2"></i></span>Kembali</a>
          <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
          <h2>Teater</h2>
        </header>
        <article class="container-fluid ">
          <form class="needs-validation" novalidate action="/admin/teater" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <input type="text" class="form-control" name="id_bioskop" value="<?= $data['id_bioskop'] ?>" id="id_bioskop" required hidden>
              <label for="nama_teater" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama_teater" id="nama_teater" required>
              <div class="invalid-feedback">
                Nama teater belum terisi!
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