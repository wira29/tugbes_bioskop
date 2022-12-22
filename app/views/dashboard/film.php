<?php
require_once __DIR__ . "/layouts/navbar.php";
?>

<div class="container mt-5">

  <div class="row">
    <div class="col-md-3 col-sm-12">
      <h4 class="sub-title">Filter</h4>

      <div class="mt-5">
        <input type="text" class="form-control" placeholder="Film">
      </div>
      <div class="mt-3">
        <input type="text" class="form-control" placeholder="Bioskop">
      </div>
      <div class="mt-3">
        <input type="date" class="form-control" placeholder="Tanggal">
      </div>
      <div class="mt-5">
        <button class="btn btn-primary" style="width: 100%;">Cari</button>
      </div>
    </div>

    <div class="col-md-9 col-sm-12">
      <h4 class="sub-title">Daftar Film</h4>

      <div class="row film-container mt-5">
        <?php foreach ($data['films'] as $film) { ?>
          <a href="<?= $uriHelper->baseUrl('film/' . $film['id']) ?>" class="col-md-3 card-film mt-3">
            <div class="card" style="background-image: url('<?= $uriHelper->baseUrl("assets/img/film/poster" . $film['poster']) ?>');">
              <div class="card-body">
                <h4><?= $film['judul'] ?></h4>
                <div class="row">
                  <p><i class="fas fa-star me-2"></i> <?= $film['rating'] ?> IMDB</p>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>

      <div class="row mt-5">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <?php if ($data['page'] != 1) { ?>
              <li class="page-item">
                <a class="page-link" href="<?= $uriHelper->baseUrl('film?page=' . $data['page'] - 1) ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            <?php } ?>
            <?php
            $i = 1;
            for ($i; $i <= ceil($data['total'] / $data['limit']); $i++) {
            ?>
              <li class="page-item"><a class="page-link <?= ($i == $data['page']) ? 'active' : '' ?>" href="<?= $uriHelper->baseUrl('film?page=' . $i) ?>"><?= $i ?></a></li>
            <?php } ?>
            <?php if ($data['page'] != ceil($data['total'] / $data['limit'])) { ?>
              <li class="page-item">
                <a class="page-link" href="<?= $uriHelper->baseUrl('film?page=' . $data['page'] + 1) ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            <?php } ?>

          </ul>
        </nav>
      </div>
    </div>

  </div>
</div>



<?php
require_once __DIR__ . "/layouts/footer.php";
?>