
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/jumbotron.png') ?>');">
      <div class="container py-5">
        <h1 class="fw-bold">Black Adam</h1>
        <p class="col-md-6 fs-5">Berkisah tentang sosok antihero yang mendapatkan kekuatan dari dewa mesir bernama Adam. Ia datang untuk menciptakan keadilan di dunia saat ini.</p>
      </div>
    </div>
    </div>
    <div class="carousel-item">
      <div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/film/cover/peaky-blinders.png') ?>');">
      <div class="container py-5">
        <h1 class="fw-bold">Peaky Blinders</h1>
        <p class="col-md-6 fs-5">Peaky Blinders adalah serial televisi drama kriminal Britania Raya yang dibuat oleh Steven Knight. Berlatar di Birmingham, Inggris, serial ini mengikuti eksploitasi keluarga mafia Shelby setelah berlangsungnya Perang Dunia I.</p>
      </div>
    </div>
    </div>
    <div class="carousel-item">
      <div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/film/cover/mortal-kombat.png') ?>');">
      <div class="container py-5">
        <h1 class="fw-bold">Mortal Kombat</h1>
        <p class="col-md-6 fs-5">Mortal Kombat adalah serial film aksi seni bela diri Amerika yang didasarkan pada serial video game pertarungan dengan nama yang sama oleh Midway Games. Film pertama diproduksi oleh Threshold Entertainment milik Lawrence Kasanoff.</p>
      </div>
    </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="container mt-5">
        <h4 class="sub-title">Film Terpopuler</h4>

        <div class="col-12  row film-container mt-5">
            <?php foreach($data['bestFilm'] as $film){ ?>
                <a href="<?= $uriHelper->baseUrl('film/' . $film['id']) ?>" class="col-md-3 card-film mt-3">
                    <div class="card" style="background-image: url('<?= $uriHelper->baseUrl("assets/img/film/poster/" . $film['poster']) ?>');">
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
    </div>

    <div class="p-5 mb-4 rounded-3 jumbotron mt-5" style="background-image: url('./assets/img/hero-2.png');">
      <div class="container py-5">
        <h3 class="fw-bold">Diskon Akhir Tahun</h3>
        <p class="col-md-6">Hemat nonton film dan dapatkan voucher TBA-ID <br> <b>Rp50 ribu</b
        > dan hadiah lainnya dengan minimal belanja Rp300 ribu</p>
      </div>
    </div>

    <div class="container mt-5" id="bantuan">
        <h4 class="sub-title">Bantuan</h4>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Bagaimana cara pesan tiket di get tiket ?
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Silahkan pilih film yang ingin anda tonton, kemudian klik pesan sekarang dan anda akan diarahkan untuk memilih bioskop, setelah memilih silahkan memilih kursi yang ingin anda tempati. Terakhir silakan melakukan pembayaran.</div>
                        </div>
                    </div>
                    <div class="accordion-item mt-3">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Bagaimana cara pesan tiket di get tiket ?
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 send-question">
                <div class="col-12">
                    <input type="text" class="form-control" placeholder="email">
                </div>
                <div class="col-12 mt-3">
                    <textarea name="" id="" rows="5" class="form-control" placeholder="pertanyaan..."></textarea>
                </div>
                <div class="col-12 d-flex flex-row justify-content-end">
                    <button class="btn btn-send mt-3">Kirim <i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 

    