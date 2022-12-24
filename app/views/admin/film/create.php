<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center gap-3">
          <a href="/admin/film" class="me-3 btn btn-warning"><span><i class="fa fa-arrow-left me-2"></i></span>Kembali</a>
          <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
          <h2>Film</h2>
        </header>
        <article class="container-fluid ">
          <form class="needs-validation" novalidate action="/admin/film" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control" name="judul" id="judul" required>
              <div class="invalid-feedback">
                Judul film belum terisi!
              </div>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea>
              <div class="invalid-feedback">
                Deskripsi belum terisi!
              </div>
            </div>
            <div class="mb-3">
              <label for="rating" class="form-label">Rating</label>
              <input type="text" class="form-control" name="rating" id="rating" required title="please enter number only">
              <div class="invalid-feedback">
                Rating film belum terisi!
              </div>
            </div>
            <div class="mb-3">
              <div class="mb-3">
                <label for="poster" class="form-label">Poster</label>
                <input class="form-control" type="file" id="poster" name="poster" required>
                <img class="img-thumbnail" width="400" src="" id="poster-preview">
                <div class="invalid-feedback">
                  Poster film belum terisi!
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input class="form-control" type="file" id="cover" name="cover" required>
                <img class="img-thumbnail" width="400" src="" id="cover-preview">
                <div class="invalid-feedback">
                  Cover film belum terisi!
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
    const posterInput = document.querySelector('#poster');
    const posterPreview = document.querySelector('#poster-preview');

    posterInput.onchange = evt => {
      const [file] = posterInput.files
      if (file) {
        posterPreview.src = URL.createObjectURL(file)
      }
    }

    const coverInput = document.querySelector('#cover');
    const coverPreview = document.querySelector('#cover-preview');

    coverInput.onchange = evt => {
      const [file] = coverInput.files
      if (file) {
        coverPreview.src = URL.createObjectURL(file)
      }
    }
  </script>
</body>

</html>