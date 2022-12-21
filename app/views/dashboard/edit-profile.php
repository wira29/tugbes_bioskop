
    <?php 
        require_once __DIR__ . "/layouts/navbar.php";
    ?> 

<div class="container mt-5">
        <h3 class="fw-bold">Edit Profile</h3>

        <div class="row mt-5">
            <div class="col-md-6 mt-3">
                <label for="">Nama</label>
                <input type="text" class="form-control mt-3" placeholder="John Doe">
            </div>
            <div class="col-md-6 mt-3">
                <label for="">Email</label>
                <input type="text" class="form-control mt-3" placeholder="john@gmail.com">
            </div>
            <div class="col-md-6 mt-3">
                <label for="">No Telepon</label>
                <input type="text" class="form-control mt-3" placeholder="081324xxxxxx">
            </div>
            <div class="col-md-6 mt-3">
                <label for="">Foto</label>
                <input type="file" class="form-control mt-3" placeholder="John Doe">
            </div>
            <div class="col-12 mt-5 text-end">
                <button class="btn btn-primary" >Simpan</button>
            </div>
        </div>
    </div>

    <?php 
        require_once __DIR__ . "/layouts/footer.php";
    ?> 