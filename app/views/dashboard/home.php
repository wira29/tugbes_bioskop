
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/jumbotron.png') ?>');">
      <div class="container py-5">
        <h1 class="fw-bold">Get Tiket</h1>
        <p class="col-md-6 fs-5">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
      </div>
    </div>
    </div>
    <div class="carousel-item">
      <div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/jumbotron.png') ?>');">
      <div class="container py-5">
        <h1 class="fw-bold">Get ABCDEF</h1>
        <p class="col-md-6 fs-5">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
      </div>
    </div>
    </div>
    <div class="carousel-item">
      <div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/jumbotron.png') ?>');">
      <div class="container py-5">
        <h1 class="fw-bold">Get GHIJ</h1>
        <p class="col-md-6 fs-5">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
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
            <div class="col-md-3 card-film">
                <div class="card">
                    <div class="card-body">
                        <h4>Gatot Kaca</h4>
                        <div class="row">
                            
                            <p><i class="fas fa-star me-2"></i> 6.7 IMDB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 card-film">
                <div class="card">
                    <div class="card-body">
                        <h4>Gatot Kaca</h4>
                        <div class="row">
                            
                            <p><i class="fas fa-star me-2"></i> 6.7 IMDB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 card-film">
                <div class="card">
                    <div class="card-body">
                        <h4>Gatot Kaca</h4>
                        <div class="row">
                            
                            <p><i class="fas fa-star me-2"></i> 6.7 IMDB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 card-film">
                <div class="card">
                    <div class="card-body">
                        <h4>Gatot Kaca</h4>
                        <div class="row">
                            
                            <p><i class="fas fa-star me-2"></i> 6.7 IMDB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="p-5 mb-4 rounded-3 jumbotron mt-5" style="background-image: url('./assets/img/hero-2.png');">
      <div class="container py-5">
        <h3 class="fw-bold">Diskon Akhir Tahun</h3>
        <p class="col-md-6">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
      </div>
    </div>

    <div class="container mt-5">
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
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
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

    