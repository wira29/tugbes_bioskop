
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

    <div  style="background-color: black;">
        <div class="container p-3">
            <a href="" class="text-white fs-5"><i class="fas fa-arrow-left me-3"></i> Kembali</a>
        </div>
    </div>
    <div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/jumbotron.png') ?>');">
      <div class="container py-5">
        <div class="row justify-content-between">
            <div class="col-3">
                <img src="<?= $uriHelper->baseUrl('assets/img/film/poster/' . $data['film']->poster) ?>" alt="">
            </div>
            <div class="col-7">
                <p>Judul Film</p>
                <h3 class="fw-bold"><?= $data['film']->judul ?></h3>
                <p><i class="fas fa-star text-warning me-2"></i> <?= $data['film']->rating ?> IMDB</p>

                <p class="mt-5">Bioskop</p>
                <p class="fw-bold">-</p>

            </div>
        </div>
      </div>
    </div>

    <div class="container container-jadwal">
        <h4 class="sub-title">Jadwal Nonton</h4>
        <div class="row mt-4">
            <div class="col-md-2 mt-3">
                <div class="card card-item active">
                    <div class="card-body">
                        <p>08 Desember 2022</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="card card-item">
                    <div class="card-body">
                        <p>09 Desember 2022</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="card card-item">
                    <div class="card-body">
                        <p>10 Desember 2022</p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-5">
        
        <div class="row mt-5">
            <div class="container-bioskop">
                <h5 class="fw-bold"><img class="me-3" src="<?= $uriHelper->baseUrl('assets/img/icon-bioskop.png') ?>" alt=""> Cinema XXI</h5>
                <p>Jl. KH Hasyim Asyari, Kauman, Malang</p>
                <div class="row justify-content-between mt-5">
                    <h5 class="col fw-bold">REGULAR 2D</h5>
                    <p class="col text-end">Rp 30.000</p>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="card card-item">
                            <div class="card-body text-center">
                                <p>11:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-end mt-5">
                    <button class="btn btn-primary">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>

    

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 
