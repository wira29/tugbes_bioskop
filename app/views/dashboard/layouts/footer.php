<div class="container mt-5">
        <hr style="color: #D9D9D9">
    </div>
<footer class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <a href="<?= $uriHelper->baseUrl('home') ?>">
                    <img src="<?= $uriHelper->baseUrl('assets/img/tba-white.png') ?>" width="100" alt="">
                </a>
                <p class="mt-3" style="width: 80%;">TBA-ID adalah sebuah website bioskop dengan tujuan memberikan penontonnya pengalaman terbaik dalam hiburan menonton, dengan membawa standar global di dunia hiburan.</p>
            </div>
            <div class="col-md-3 text-white">
                <h5 class="fw-bold">Menu</h5>
                <ul class="menu mt-3"> 
                    <li><a href="<?= $uriHelper->baseUrl('home') ?>">Beranda</a></li>
                    <li><a href="<?= $uriHelper->baseUrl('film') ?>">Film</a></li>
                    <li><a href="<?= $uriHelper->baseUrl('contact') ?>">Hubungi Kami</a></li>
                    <li><a href="">Bantuan</a></li>
                </ul>
            </div>
            <div class="col-md-4">
            <h5 class="fw-bold">Kontak</h5>
                <ul class="menu mt-3"> 
                    <li><i class="fa-brands fa-instagram me-2"></i> get_ticket</li>
                    <li><i class="fa-solid fa-envelope me-2"></i> gettiket@gmail.com</li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>