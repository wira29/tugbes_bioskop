<?php
class AdminTeaterController extends Controller
{

  public function index()
  {
    $this->view('admin/jadwal/teater/index');
  }

  public function getByBioskop(int $id_bioskop)
  {
    $data = $this->model('TeaterModel')->fetchDatatableByBioskop($id_bioskop);
    echo json_encode($data);
  }

  public function getAll()
  {
    $data = $this->model('TeaterModel')->fetchDatatable();
    echo json_encode($data);
  }

  public function create()
  {
    $this->view('admin/jadwal/teater/create');
  }

  public function createByBioskop(int $id_bioskop)
  {
    $this->view('admin/bioskop/teater/create', ['id_bioskop' => $id_bioskop]);
  }


  public function storeByBioskop()
  {
    $result = $this->model('TeaterModel')->insert($_POST);
    if ($result > 0) {
      $this->back($_POST['id_bioskop']);
    }
  }

  public function store()
  {
    $result = $this->model('TeaterModel')->insert($_POST);
    if ($result > 0) {
      header("Location: /admin/jadwal");
    }
  }

  public function edit(int $id_bioskop, int $id)
  {
    $data = $this->model('TeaterModel')->getByIdAndBioskop($id, $id_bioskop);
    $data['id_bioskop'] = $id_bioskop;
    $this->view('admin/bioskop/teater/edit', $data);
  }

  public function update(int $id)
  {
    $_POST['id'] = $id;
    $result = $this->model('TeaterModel')->update($_POST);
    if ($result > 0) {
      $this->back($_POST['id_bioskop']);
    }
  }

  public function destroy(int $id)
  {
    $result = $this->model('TeaterModel')->delete($id);
    if ($result > 0) {
      $this->back($_POST['id_bioskop']);
    }
  }

  function back($id_bioskop)
  {
    header("Location: /admin/bioskop/" . $id_bioskop . "/edit");
    die();
  }
}
