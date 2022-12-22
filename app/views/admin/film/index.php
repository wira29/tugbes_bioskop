<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center justify-content-between">
          <div>
            <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Film</h2>
          </div>
          <a type="button" href="/admin/film/create" class="m-3 btn btn-primary">Create</a>

        </header>
        <article class="container-fluid ">
          <table id="film-table" class="table table-striped w-100">
            <thead>
              <tr>
                <th>Id</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Rating</th>
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
      const table = $('#film-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/admin/film/getall",
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
            "data": "judul"
          },
          {
            "data": "deskripsi"
          },
          {
            "data": "rating"
          },
          {
            defaultContent: `<div class="d-flex gap-3 justify-content-center">
            <button class="btn-edit btn btn-warning">Edit</button>
          <button class="btn-delete btn btn-danger">Delete</button>
          </div>`
          },
        ]
      })


      $('#film-table tbody').on('click', '.btn-edit', function() {
        console.log('p')
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;
        window.location = `/admin/film/${id}/edit`;
      });
      $('#film-table tbody').on('click', '.btn-delete', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;

        $.ajax({
          url: `/admin/film/${id}/delete`,
          method: 'POST'
        }).done(function() {
          location.reload();
        })
      });
    })
  </script>
</body>

</html>