<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center gap-3">
            <a class="text-theme-primary " data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Transaksi</h2>
          </div>
          <!-- <a type="button" href="/admin/user/create" class="m-3 btn btn-primary">Create</a> -->

        </header>
        <article class="container-fluid ">
          <table id="user-table" class="table table-striped w-100">
            <thead>
              <tr>
                <th>Id</th>
                <th>User</th>
                <th>Tanggal</th>
                <th>Total</th>
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
      const table = $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?= Helper::baseUrl() ?>transaksi/getall",
          type: "POST",
        },
        columnDefs: [{
            target: 0,
            visible: false,
          },
          {
            target: 4,
            sortable: false,
          },
        ],
        columns: [{
            "data": "id"
          }, {
            "data": "nama_user"
          },

          {
            "data": "tanggal_transaksi"
          },
          {
            "data": "total_harga"
          },
          {
            defaultContent: `<div class="d-flex gap-3 justify-content-center">
            <button class="btn-detail btn btn-success">Lihat Detail</button>
          </div>`
          },
        ]
      })


      $('#user-table tbody').on('click', '.btn-detail', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;
        window.location = `<?= Helper::baseUrl() ?>admin/transaksi/${id}/detail`;
      });
    })
  </script>
</body>

</html>