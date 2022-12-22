<?php require_once __DIR__ . '/../layouts/header.php';
?>

<body>
  <div class="override">
    <div class="d-flex max-w-100">
      <aside id="sidebar" class="col-auto collapse collapse-horizontal show min-vh-100 text-white bg-theme-primary " id="sidebar">
        <div class="d-flex flex-column p-3 h-100">
          <h2 class="d-flex align-items-center me-md-auto mb-3 py-3 px-5">Admin</h2>
          <ul class="nav nav-pills gap-3 flex-column">
            <li class="nav-item">
              <a class="nav-link" href="/admin">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-active" href="/admin/user">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/film">Film</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/bioskop">Bioskop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/transaksi">Transaksi</a>
            </li>
            <li class="nav-item mt-auto">
              <a class="nav-link justify-content-end" href="/admin/logout">Logout</a>
            </li>
          </ul>
        </div>
      </aside>
      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center justify-content-between">
          <div>
            <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>User</h2>
          </div>
          <a type="button" href="/admin/user/create" class="m-3 btn btn-primary">Create</a>

        </header>
        <article class="container-fluid ">
          <table id="user-table" class="table table-striped w-100">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
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
      // $('#user-table').DataTable();
      const table = $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/admin/user/getall", // json
          type: "POST", // type of method
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
            "data": "nama"
          },
          {
            "data": "email"
          },
          {
            "data": "no_telepon"
          },
          {
            defaultContent: `<div class="d-flex gap-3 justify-content-center">
            <button class="btn-edit btn btn-warning">Edit</button>
          <button class="btn-delete btn btn-danger">Delete</button>
          </div>`
          },
        ]
      })


      $('#user-table tbody').on('click', '.btn-edit', function() {
        console.log('p')
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;
        window.location = `/admin/user/${id}/edit`;
      });
      $('#user-table tbody').on('click', '.btn-delete', function() {
        const row = $(this).closest('tr');
        const id = table.row(row).data().id;

        $.ajax({
          url: `/admin/user/${id}/delete`,
          method: 'POST'
        }).done(function() {
          location.reload();
        })
      });
    })
  </script>
</body>

</html>