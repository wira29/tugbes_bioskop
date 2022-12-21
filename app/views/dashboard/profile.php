
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

<div class="container">
        <div class="row">
            <div class="col-md-4 text-end">
                <img src="<?= $uriHelper->baseUrl('assets/img/user.png') ?>" width="200" height="200" class="rounded-circle" alt="">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h3 class="fw-bold">Andi Santoso</h3>
                <p class="m-1">089123456778</p>
                <p>andi@gmail.com</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8 p-3 container-menu" style="background-color: #343438;">
                <ul>
                    <li><a href="">Update Profile</a></li>
                    <li><a href="">Transaksi</a></li>
                    <li><a href="">Kontak Kami</a></li>
                    <li><a href="">Keluar</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 