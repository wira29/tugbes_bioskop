<h2 class="mt-4 mx-2">Teater</h2>
<a type="button" href="/admin/bioskop/<?= $data['id_bioskop'] ?>/teater/create" class="m-2 btn btn-primary">Tambah Teater</a>
<table id="teater-table" class="table table-striped w-100">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
  </thead>
</table>
<script>
  $(document).ready(function() {
    const table = $('#teater-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: `/admin/bioskop/${<?= $data['id_bioskop'] ?>}/teater/getall`,
        type: "POST",
      },
      columnDefs: [{
          target: 0,
          visible: false,
        },
        {
          target: 2,
          sortable: false,
        },
      ],
      columns: [{
          "data": "id"
        }, {
          "data": "nama_teater"
        },
        {
          defaultContent: `<div class="d-flex gap-3 justify-content-center">
            <button class="btn-edit btn btn-warning">Edit</button>
          <button class="btn-delete btn btn-danger">Delete</button>
          </div>`
        },
      ]
    })


    $('#teater-table tbody').on('click', '.btn-edit', function() {
      console.log('p')
      const row = $(this).closest('tr');
      const id = table.row(row).data().id;

      window.location = `/admin/bioskop/<?= $data['id_bioskop'] ?>/teater/${id}/edit`;
    });
    $('#teater-table tbody').on('click', '.btn-delete', function() {
      const row = $(this).closest('tr');
      const id = table.row(row).data().id;

      $.ajax({
        url: `/admin/teater/${id}/delete`,
        method: 'POST'
      }).done(function() {
        location.reload();
      })
    });
  })
</script>
</body>

</html>