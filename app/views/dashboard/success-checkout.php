
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?>

    <div class="container mt-5">

        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="<?= $uriHelper->baseUrl('assets/img/success-icon.png') ?>" alt="">
                <h4 class="fw-bold mt-5">Pembayaran Berhasil</h4>
                <a href="<?= $uriHelper->baseUrl('home') ?>" class="btn btn-primary mt-3">Kembali Ke Beranda</a>
            </div>
        </div>
        
        <hr>

        <div class="row">
            <div class="col-md-4">
                <img src="<?= $uriHelper->baseUrl('assets/img/'. $data['transaksi']->poster) ?>" width="384" height="384" alt="">
            </div>
            <div class="col-md-8">
                <div class="detail-item">
                    <p>Judul Film</p>
                    <h3 class="fw-bold"><?= $data['transaksi']->judul ?></h3>
                    <p><i class="fas fa-star fs-6"></i> <?= $data['transaksi']->rating ?> IMDB</p>
                </div>
                <div class="detail-item mt-5">
                    <p>Bioskop</p>
                    <h3 class="fw-bold"><?= $data['transaksi']->nama ?></h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <p>Jadwal</p>
                <h3 class="fw-bold"><?= date('d F Y', strtotime($data['transaksi']->tanggal)) ?></h3>
            </div>
            <div class="col-md-6">
                <p>Total Tempat Duduk</p>
                <h3 class="fw-bold"><?= count($data['kursi']) ?></h3>
            </div>
            <div class="col-md-6">
                <p>Jam</p>
                <h3 class="fw-bold"><?= date("H : i", strtotime($data['transaksi']->waktu)) ?> WIB</h3>
            </div>
            <div class="col-md-6">
                <p>Tempat Duduk</p>
                <h3 class="fw-bold">
                    <?php foreach($data['kursi'] as $k){
                        echo $k['kursi'] . ' ';
                    } ?>
                </h3>
            </div>
        </div>
        
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 