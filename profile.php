<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style.css">

    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/75fbb137eb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg">
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex flex-row justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav py-2">
            <a class="nav-link me-3 active" aria-current="page" href="#">Beranda</a>
            <a class="nav-link me-3" href="#">Film</a>
            <a class="nav-link me-3" href="#">Bantuan</a>
            <a class="nav-link btn btn-login" href="#">Masuk</a>
        </div>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 text-end">
                <img src="./assets/img/user.png" width="200" height="200" class="rounded-circle" alt="">
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

    <div class="container mt-5">
        <hr style="color: #D9D9D9">
    </div>

    <footer class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <p style="width: 80%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut ornare velit. Phasellus eget congue leo. Proin placerat id mauris ac tempus. Nulla pulvinar a elit ac auctor. Curabitur placerat orci urna, sit amet vulputate leo condimentum et. Pellentesque ac |Cras tempor facilisis cursus.</p>
            </div>
            <div class="col-md-3 text-white">
                <h5 class="fw-bold">Menu</h5>
                <ul class="menu mt-3"> 
                    <li><a href="">Beranda</a></li>
                    <li><a href="">Film</a></li>
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