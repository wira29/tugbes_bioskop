<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center justify-content-between">
          <div>
            <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Teater</h2>
          </div>

        </header>
        <article class="container-fluid ">
          <table id="teater-table" class="table table-striped w-100">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nama Teater</th>
                <th>Nama Bioskop</th>
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
      console.log
      const table = $('#teater-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/teater/getall",
          type: "POST",
        },
        columnDefs: [{
            target: 0,
            visible: false,
          },
          {
            target: 3,
            sortable: false,
          },
        ],
        columns: [{
            "data": "id"
          }, {
            "data": "nama_teater"
          },
          {
            "data": "nama_bioskop"
          },
          {
            defaultContent: `<div class="d-flex gap-3 justify-content-center">
            <button class="btn-jadwal btn btn-success">Lihat Jadwal</button>
          </div>`
          },
        ]
      })

      $('#teater-table tbody').on('click', '.btn-jadwal', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;
        window.location = `/admin/teater/${id}/jadwal`;
      });

    })
  </script>
</body>

</html>