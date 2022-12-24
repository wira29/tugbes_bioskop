<?php
class AdminJadwalController extends Controller
{

  public function indexByTeater(int $id_teater)
  {
    $this->view('admin/jadwal/indexByTeater', ['id_teater' => $id_teater]);
  }

  public function getByTeater(int $id_teater)
  {
    $data = $this->model('JadwalModel')->fetchDatatableByTeater($id_teater);
    echo json_encode($data);
  }

  public function getAll()
  {
    $data = $this->model('JadwalModel')->fetchDatatable();
    echo json_encode($data);
  }


  public function create(int $id_teater)
  {
    $this->view('admin/jadwal/create', ['id_teater' => $id_teater]);
  }

  public function store()
  {

    $result = $this->model('JadwalModel')->insert($_POST);
    if ($result > 0) {
      $this->back($_POST['id_teater']);
    }
  }

  public function edit(int $id_teater, int $id)
  {
    $data = $this->model('JadwalModel')->getByIdAndTeater($id, $id_teater);
    $data['id_teater'] = $id_teater;
    $this->view('admin/jadwal/edit', $data);
  }

  public function update(int $id)
  {
    $_POST['id'] = $id;
    $result = $this->model('JadwalModel')->update($_POST);
    if ($result > 0) {
      $this->back($_POST['id_teater']);
    }
  }

  public function destroy(int $id)
  {
    $result = $this->model('JadwalModel')->delete($id);
    if ($result > 0) {
      $this->back($_POST['id_teater']);
    }
  }

  function back($id_teater)
  {
    header("Location: /admin/teater/" . $id_teater . "/jadwal");
    die();
  }
}
