
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

<div class="container mt-5">
        
        <div class="col-12 card card-transaksi">
            <div class="card-body p-5">
                <h3 class="fw-bold">Daftar Transaksi</h3>

                <div class="row mt-5">
                    <?php foreach($data['transaksi'] as $tr){ ?>
                    <div class="col-12 mt-3">
                        <div class="card card-transaksi-item">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="<?= $uriHelper->baseUrl('assets/img/' . $tr['poster']) ?>" width="120" height="120" alt="">
                                    </div>
                                    <div class="col-6 d-flex flex-column justify-content-center">
                                        <p><span class="fw-bold fs-3 me-3"><?= $tr['judul'] ?></span> x<?= count($tr['kursi']) ?> Tiket</p>
                                        <p class="m-0"><?= $tr['nama'] ?></p>
                                        <p><?= date('d F Y', strtotime($tr['tanggal'])) ?>, <?= date('H:i', strtotime($tr['waktu'])) ?></p>
                                    </div>
                                    <div class="col-4 d-flex flex-column justify-content-center text-end">
                                        <p><?= date('d F Y', strtotime($tr['tanggal_transaksi'])) ?></p>
                                        <p class="fw-bold m-0">Total Bayar</p>
                                        <p class="fw-bold">Rp <?= $tr['total_harga'] + 10000 ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 