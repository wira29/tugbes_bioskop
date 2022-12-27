
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?>

    <div class="container mt-5">
        
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

        <hr>

        <div class="row justify-content-end">
            <div class="col-md-6">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td width="50%" style="vertical-align: middle;">Tiket Bioskop (<?= count($data['kursi']) ?>x)</td>
                            <td width="50%"><h4 class="fw-bold" style="text-align: end;">Rp.<?= $data['transaksi']->total_harga ?> </h4></td>
                        </tr>
                        <tr>
                            <td width="50%" style="vertical-align: middle;">Biaya Layanan</td>
                            <td width="50%"><h4 class="fw-bold" style="text-align: end;">Rp.10000 </h4></td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <td width="50%" style="vertical-align: middle;">Total Harga</td>
                            <td width="50%"><h4 class="fw-bold" style="text-align: end;">Rp.<?= $data['transaksi']->total_harga + 10000 ?> </h4></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-12 text-end mt-5">
                    <a href="<?= $uriHelper->baseUrl('success-checkout/' . $data['transaksi']->id_transaksi) ?>" class="btn btn-primary">checkout</a>
                </div>
            </div>
        </div>
        
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 