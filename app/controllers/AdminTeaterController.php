<?php
class AdminTeaterController extends Controller
{

  public function index()
  {
    $data = $this->model('TeaterModel')->getAll();
    $this->view('admin/teater/index', $data);
  }

  public function getAll(int $id_bioskop)
  {
    $data = $this->model('TeaterModel')->fetchDatatable($id_bioskop);
    echo json_encode($data);
  }

  public function create(int $id_bioskop)
  {
    $this->view('admin/teater/create', ['id_bioskop' => $id_bioskop]);
  }

  public function store()
  {

    $result = $this->model('TeaterModel')->insert($_POST);
    if ($result > 0) {
      $this->back($_POST['id_bioskop']);
    }
  }

  public function edit(int $id_bioskop, int $id)
  {
    $data = $this->model('TeaterModel')->getByIdAndBioskop($id, $id_bioskop);
    $data['id_bioskop'] = $id_bioskop;
    $this->view('admin/teater/edit', $data);
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
