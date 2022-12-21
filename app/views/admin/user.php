<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="../assets/css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
  </script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js">
  </script>
  <script src="https://kit.fontawesome.com/75fbb137eb.js" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
  <div class="contianer-fluid override">
    <div class="row flex-nowrap mw-100">
      <aside id="sidebar" class="col-auto collapse collapse-horizontal show min-vh-100 text-white bg-theme-tertiary " id="sidebar">
        <div class="d-flex flex-column p-3">
          <h2 class="d-flex align-items-center me-md-auto mb-3">Admin</h2>
          <ul class="nav nav-pills gap-3 flex-column flex-shrink-0 mb-auto">
            <li class="nav-item"><a class="nav-link link-active" href="">Menu 1</a></li>
            <li class="nav-item"><a class="nav-link text-white bg-theme-tertiary" href="">Menu2asadaa</a></li>
            <li class="nav-item"><a class="nav-link text-white bg-theme-tertiary" href="">Menu3</a></li>
            <li class="nav-item"><a class="nav-link text-white bg-theme-tertiary" href="">Menu4</a></li>
            <li class="nav-item"><a class="nav-link text-white bg-theme-tertiary" href="">Menu5</a></li>
          </ul>
        </div>
      </aside>
      <main class="col pt-4">
        <header class="container d-flex align-items-center gap-3">
          <a class="text-theme-primary d-md-none" data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
          <h2>Dashboard z</h2>
        </header>
        <article class="container">
          <table id="user-table" class="display table table-striped w-10">
          </table>
          <?php
          foreach ($data as $row) {
            echo $row['name'] . "\n";
          }
          ?>
        </article>
      </main>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>