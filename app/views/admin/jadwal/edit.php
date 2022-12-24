<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center gap-3">
          <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
          <h2>Jadwal</h2>
        </header>
        <article class="container-fluid ">
          <form class="needs-validation" novalidate action="/admin/jadwal/<?= $data['id'] ?>/update" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control" name="id_teater" value="<?= $data['id_teater'] ?>" id="id_teater" required hidden>
            <div class="mb-3 w-25">
              <input type="text" class="form-control" name='id_film' value="<?= $data['id_film'] ?>" id="id_film" required hidden />
              <label for="film" class="form-label">Film</label>
              <input type="text" class="form-control" value="<?= $data['judul_film'] ?>" id="film" required onchange="setIdMovie(event)" />
              <div class="invalid-feedback">
                Film belum terisi!
              </div>
            </div>
            <div class="mb-3 w-25">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control" value="<?= $data['tanggal'] ?>" placeholder="dd-mm-yyyy" name="tanggal" id="tanggal" required />
              <div class="invalid-feedback">
                Tanggal jadwal belum terisi!
              </div>
            </div>
            <div class="mb-3 w-25">
              <label for="waktu" class="form-label">Waktu</label>
              <input type="time" class="form-control" value="<?= $data['waktu'] ?>" id="waktu" name="waktu" required />
              <div class="invalid-feedback">
                Waktu jadwal belum terisi!
              </div>
            </div>

            <div class="mb-3">
              <label for="harga" class="form-label">Harga Tiket</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp </span>
                </div>
                <input type="text" class="form-control" name="harga" value="<?= $data['harga'] ?>" id="harga" required pattern="[0-9]+" title="please enter number only">
                <div class="invalid-feedback">
                  Harga tiket film belum terisi atau tidak valid!
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
    let films = []
    const setIdMovie = (e) => {
      films.filter((film) => {
        if (film.judul == e.target.value) {
          document.getElementById('id_film').value = film.id
        }
      })
    }
    $(function() {
      $("#film").autocomplete({
        source: function(request, response) {
          $.post("/admin/film/search", {
            query: request.term
          }, function(data) {
            data = JSON.parse(data)
            films = [...data]
            let dat = []
            data.map((film) => {
              dat.push(film['judul'])
            })
            response(dat);
          });
        },
        minLength: 3
      });
    });
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