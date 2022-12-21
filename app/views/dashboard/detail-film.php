
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

<div class="p-5 mb-4 rounded-3 jumbotron">
      <div class="container py-5">
        <div class="row justify-content-between">
            <div class="col-3">
                <img src="<?= $uriHelper->baseUrl('assets/img/black-adam.png') ?>" alt="">
            </div>
            <div class="col-7">
                <h3 class="fw-bold">Black Adam</h3>
                <p><i class="fas fa-star text-warning me-2"></i> 7.2 IMDB</p>

                <p class="mt-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>

                <a href="" class="btn btn-primary mt-5">Pesan Sekarang</a>
            </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">

        <div class="row">

            <div class="col-md-12 col-sm-12">
                <h4 class="sub-title">Film Lainnya</h4>

                <div class="row film-container mt-5">
                    <div class="col-md-3 card-film mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Gatot Kaca</h4>
                                <div class="row">
                                    
                                    <p><i class="fas fa-star me-2"></i> 6.7 IMDB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 card-film mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Gatot Kaca</h4>
                                <div class="row">
                                    
                                    <p><i class="fas fa-star me-2"></i> 6.7 IMDB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 card-film mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Gatot Kaca</h4>
                                <div class="row">
                                    
                                    <p><i class="fas fa-star me-2"></i> 6.7 IMDB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 card-film mt-3">
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
            
        </div>
    </div>

    

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 
