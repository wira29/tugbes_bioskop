<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center justify-content-between">
          <a href="/admin/jadwal" class="me-3 btn btn-warning"><span><i class="fa fa-arrow-left me-2"></i></span>Kembali</a>
          <div>
            <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Jadwal</h2>
          </div>
          <a type="button" href="/admin/teater/<?= $data['id_teater'] ?>/jadwal/create" class="m-3 btn btn-primary">Tambah Jadwal</a>

        </header>
        <article class="container-fluid ">
          <table id="jadwal-table" class="table table-striped w-100">
            <thead>
              <tr>
                <th>Id</th>
                <th>Film</th>
                <th>Teater</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Harga Tiket</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </article>
      </main>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      const table = $('#jadwal-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/teater/<?= $data['id_teater'] ?>/jadwal/getbyteater",
          type: "POST",
        },
        columnDefs: [{
            target: 0,
            visible: false,
          },
          {
            target: 6,
            sortable: false,
          },
        ],
        columns: [{
            "data": "id"
          }, {
            "data": "judul_film"
          },
          {
            "data": "nama_teater"
          },
          {
            "data": "tanggal"
          },
          {
            "data": "waktu"
          },
          {
            "data": "harga"
          },
          {
            defaultContent: `<div class="d-flex gap-3 justify-content-center">
            <button class="btn-edit btn btn-warning">Edit</button>
          <button class="btn-delete btn btn-danger">Delete</button>
          </div>`
          },
        ]
      })


      $('#jadwal-table tbody').on('click', '.btn-edit', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;
        window.location = `/admin/teater/<?= $data['id_teater'] ?>/jadwal/${id}/edit`;
      });
      $('#jadwal-table tbody').on('click', '.btn-delete', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;

        $.ajax({
          url: `/jadwal/${id}/delete`,
          method: 'POST'
        }).done(function() {
          location.reload();
        })
      });
    })
  </script>
</body>

</html>