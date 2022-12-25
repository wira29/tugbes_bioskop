<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center gap-3">
          <a href="/admin/transaksi" class="me-3 btn btn-warning"><span><i class="fa fa-arrow-left me-2"></i></span>Kembali</a>
          <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
          <h2>Transaksi</h2>
        </header>
        <article class="container-fluid ">
          <div class="my-3">
            <h5>Nama Customer : <?= $data['transaksi']['nama_user'] ?></h5>
            <h5>Tanggal Transaksi : <?= $data['transaksi']['tanggal_transaksi'] ?></h5>
            <h5>Tiket : <?= $data['transaksi']['harga_tiket'] ?> <?= count($data['detailTransaksi']) ?>x </h5>

            <h5>Total Harga : <?= $data['transaksi']['total_harga'] ?></h5>
          </div>
          <div class="mb-3">
            <h3>Film</h3>
            <h5>Judul Film : <?= $data['transaksi']['judul_film'] ?></h5>
            <h5>Tanggal Tayang : <?= $data['transaksi']['tanggal_jadwal'] ?></h5>
            <h5>Waktu Tayang : <?= $data['transaksi']['waktu_jadwal'] ?></h5>
            <h3>Kursi : <?php foreach ($data['detailTransaksi'] as $detail) {
                          echo $detail['kursi'] . " ";
                        } ?></h3>
          </div>
        </article>
      </main>
    </div>
  </div>

  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
</body>

</html>