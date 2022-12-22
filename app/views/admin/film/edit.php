<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <aside id="sidebar" class="col-auto collapse collapse-horizontal show min-vh-100 text-white bg-theme-primary " id="sidebar">
        <div class="d-flex flex-column p-3 h-100">
          <h2 class="d-flex align-items-center me-md-auto mb-3 py-3 px-5">Admin</h2>
          <ul class="nav nav-pills gap-3 flex-column">
            <li class="nav-item">
              <a class="nav-link" href="/admin">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/user">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  link-active" href="/admin/film">Film</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/bioskop">Bioskop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/transaksi">Transaksi</a>
            </li>
            <li class="nav-item mt-auto">
              <a class="nav-link justify-content-end" href="/admin/logout">Logout</a>
            </li>
          </ul>
        </div>
      </aside>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center gap-3">
          <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
          <h2>Film</h2>
        </header>
        <article class="container-fluid ">
          <article class="container-fluid ">
            <form class="needs-validation" novalidate action="/admin/film/<?= $data->id ?>/update" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= $data->judul ?>" id="judul" required>
                <div class="invalid-feedback">
                  Judul film belum terisi!
                </div>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" required><?= $data->deskripsi ?></textarea>
                <div class="invalid-feedback">
                  Deskripsi film belum terisi!
                </div>
              </div>
              <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="text" class="form-control" name="rating" value="<?= $data->rating ?>" id="rating" required title="please enter number only">
                <div class="invalid-feedback">
                  Rating film belum terisi!
                </div>
              </div>
              <div class="mb-3">
                <div class="mb-3">
                  <label for="poster" class="form-label">Poster</label>
                  <input class="form-control" type="file" id="poster" name="poster">
                  <img class="img-thumbnail" width="400" src="/assets/img/film/poster/<?= $data->poster ?>" id="poster-preview">
                </div>
              </div>
              <div class="mb-3">
                <div class="mb-3">
                  <label for="cover" class="form-label">Cover</label>
                  <input class="form-control" type="file" id="cover" name="cover">
                  <img class="img-thumbnail" width="400" src="/assets/img/film/cover/<?= $data->cover ?>" id="cover-preview">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </article>
        </article>
      </main>
    </div>
  </div>
  <script>
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