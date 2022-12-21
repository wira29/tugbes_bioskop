
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

<div class="container mt-5">
        
        <div class="col-12 card card-transaksi">
            <div class="card-body p-5">
                <h3 class="fw-bold">Daftar Transaksi</h3>

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card card-transaksi-item">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="<?= $uriHelper->baseUrl('assets/img/black-adam.png') ?>" width="120" height="120" alt="">
                                    </div>
                                    <div class="col-6 d-flex flex-column justify-content-center">
                                        <p><span class="fw-bold fs-3 me-3">Black Adam</span> x4 Tiket</p>
                                        <p class="m-0">BTM BOGOR TRADE MALL</p>
                                        <p>Minggu, 12 Desember 2022, 15:00</p>
                                    </div>
                                    <div class="col-4 d-flex flex-column justify-content-center text-end">
                                        <p>16 Desember 2022</p>
                                        <p class="fw-bold m-0">Total Bayar</p>
                                        <p class="fw-bold">Rp 64.000</p>
                                    </div>
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