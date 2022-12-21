
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?>

    <div class="container mt-5">

        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="<?= $uriHelper->baseUrl('assets/img/success-icon.png') ?>" alt="">
                <h4 class="fw-bold mt-5">Pembayaran Berhasil</h4>
                <a href="" class="btn btn-primary mt-3">Kembali Ke Beranda</a>
            </div>
        </div>
        
        <hr>

        <div class="row mt-5">
            <div class="col-md-4">
                <img src="<?= $uriHelper->baseUrl('assets/img/black-adam.png') ?>" width="384" height="384" alt="">
            </div>
            <div class="col-md-8">
                <div class="detail-item">
                    <p>Judul Film</p>
                    <h3 class="fw-bold">Black Adam</h3>
                    <p><i class="fas fa-star fs-6"></i> 7.2 IMDB</p>
                </div>
                <div class="detail-item mt-5">
                    <p>Bioskop</p>
                    <h3 class="fw-bold">BTM BOGOR TRADE MALL</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <p>Jadwal</p>
                <h3 class="fw-bold">Minggu , 12 Desember 2022</h3>
            </div>
            <div class="col-md-6">
                <p>Total Tempat Duduk</p>
                <h3 class="fw-bold">4</h3>
            </div>
            <div class="col-md-6">
                <p>Jam</p>
                <h3 class="fw-bold">15.00 WIB</h3>
            </div>
            <div class="col-md-6">
                <p>Tempat Duduk</p>
                <h3 class="fw-bold">A3, A4, A5, A6</h3>
            </div>
        </div>
        
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 