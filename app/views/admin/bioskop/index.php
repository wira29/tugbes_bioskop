<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center gap-3">
            <a class="text-theme-primary " data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Bioskop</h2>
          </div>
          <a type="button" href="/admin/bioskop/create" class="m-3 btn btn-primary"><span><i class="fa fa-plus me-2"></i>Tambah Bioskop</a>

        </header>
        <article class="container-fluid ">
          <table id="bioskop-table" class="table table-striped w-100">
            <thead>
              <tr>
                <th>Id</th>
                <th>Judul</th>
                <th>Alamat</th>
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
      const table = $('#bioskop-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/bioskop/getall",
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
            "data": "nama"
          },
          {
            "data": "alamat"
          },
          {
            defaultContent: `<div class="d-flex gap-3 justify-content-center">
            <button class="btn-edit btn btn-warning"><span><i class="fa fa-edit me-2"></i>Edit</button>
          <button class="btn-delete btn btn-danger"><span><i class="fa fa-trash me-2"></i>Delete</button>
          </div>`
          },
        ]
      })


      $('#bioskop-table tbody').on('click', '.btn-edit', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;
        window.location = `/admin/bioskop/${id}/edit`;
      });
      $('#bioskop-table tbody').on('click', '.btn-delete', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;

        $.ajax({
          url: `/admin/bioskop/${id}/delete`,
          method: 'POST'
        }).done(function() {
          location.reload();
        })
      });
    })
  </script>
</body>

</html>