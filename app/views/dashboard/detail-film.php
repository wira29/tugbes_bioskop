
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

<div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/jumbotron.png') ?>');">
      <div class="container py-5">
        <div class="row justify-content-between">
            <div class="col-3">
                <img src="<?= $uriHelper->baseUrl('assets/img/film/poster/' . $data['film']->poster) ?>" alt="">
            </div>
            <div class="col-7">
                <h3 class="fw-bold"><?= $data['film']->judul ?></h3>
                <p><i class="fas fa-star text-warning me-2"></i> <?= $data['film']->rating ?> IMDB</p>

                <p class="mt-5">
                    <?= $data['film']->deskripsi ?>
                </p>

                <a href="<?= $uriHelper->baseUrl('checkout/' . $data['film']->id) ?>" class="btn btn-primary mt-5">Pesan Sekarang</a>
            </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">

        <div class="row">

            <div class="col-md-12 col-sm-12">
                <h4 class="sub-title">Film Lainnya</h4>

                <div class="row film-container mt-5">
                    <?php foreach($data['lainnya'] as $lainnya){ ?>
                    <a href="<?= $uriHelper->baseUrl('film/'.$lainnya['id']) ?>" class="col-md-3 card-film mt-3">
                        <div class="card" style="background-image: url('<?= $uriHelper->baseUrl("assets/img/film/poster/". $lainnya['poster']) ?>');">
                            <div class="card-body">
                                <h4><?= $lainnya['judul'] ?></h4>
                                <div class="row">
                                    <p><i class="fas fa-star me-2"></i> <?= $lainnya['rating'] ?> IMDB</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
            
        </div>
    </div>

    

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 
