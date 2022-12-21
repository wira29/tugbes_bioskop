
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

<div class="navigation col-12">
        <div class="container p-3">
        <a href=""><i class="fas fa-arrow-left me-3"></i> Pilih Kursi</a>
        </div>
    </div>

    <div class="container mt-5">
        
        <div class="row">
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

        <hr>

        <div class="row justify-content-end">
            <div class="col-md-6">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td width="50%" style="vertical-align: middle;">Tiket Bioskop (4x)</td>
                            <td width="50%"><h4 class="fw-bold" style="text-align: end;">Rp.120000 </h4></td>
                        </tr>
                        <tr>
                            <td width="50%" style="vertical-align: middle;">Biaya Layanan (4x)</td>
                            <td width="50%"><h4 class="fw-bold" style="text-align: end;">Rp.12000 </h4></td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <td width="50%" style="vertical-align: middle;">Diskon</td>
                            <td width="50%"><h4 class="fw-bold" style="text-align: end;">- Rp.20000 </h4></td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <td width="50%" style="vertical-align: middle;">Total Harga</td>
                            <td width="50%"><h4 class="fw-bold" style="text-align: end;">Rp.112000 </h4></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-12 text-end mt-5">
                    <button class="btn btn-primary">checkout</button>
                </div>
            </div>
        </div>
        
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 