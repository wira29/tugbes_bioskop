<h2 class="mt-4 mx-2">Teater</h2>
<a type="button" href="<?= Helper::baseUrl('admin/bioskop/' . $data['id_bioskop'] . '/edit') ?>" class="m-2 btn btn-primary"><span><i class="fa fa-plus me-2"></i>Tambah Teater</a>
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
<script>
  $(document).ready(function() {
    const table = $('#teater-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: `<?= Helper::baseUrl('bioskop/' . $data['id_bioskop'] . '/teater/getbybioskop') ?>`,
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
            <button class="btn-edit btn btn-warning"><span><i class="fa fa-edit me-2"></i>Edit</button>
          <button class="btn-delete btn btn-danger"><span><i class="fa fa-trash me-2"></i>Delete</button>
          </div>`
        },
      ]
    })


    $('#teater-table tbody').on('click', '.btn-edit', function() {
      const row = $(this).closest('tr');
      const id = table.row(row).data().id;

      window.location = `<?= Helper::baseUrl() ?>admin/bioskop/<?= $data['id_bioskop'] ?>/teater/${id}/edit`;
    });
    $('#teater-table tbody').on('click', '.btn-delete', function() {
      const row = $(this).closest('tr');
      const id = table.row(row).data().id;

      $.ajax({
        url: `<?= Helper::baseUrl() ?>teater/${id}/delete`,
        method: 'POST'
      }).done(function() {
        location.reload();
      })
    });
  })
</script>
</body>

</html>