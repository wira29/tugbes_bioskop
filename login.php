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
<body>
    <div class="bg-auth">
        <div class="col-4">
            <div class="card card-auth">
                <div class="card-body p-5">
                    <h1 class="title">Selamat Datang</h1>
                    <p>silahkan masuk ke dalam akun anda</p>
                    <div class="divider"></div>
                    <div class="row mt-3">
                        <div class="col-12 mt-5">
                            <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="form-control" type="text" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="input-container">
                                <i class="fa fa-lock icon"></i>
                                <input class="form-control" type="text" placeholder="Password" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="d-grid gap-2">
                            <button class="btn btn-auth" type="button">Masuk</button>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-google" type="button"><i class="fa-brands fa-google me-2"></i> Continue With Google</button>
                        </div> 
                        <div class="col-12 footer mt-5">
                            <p>belum punya akun ? <a href="./register.php" class="btn-link">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>