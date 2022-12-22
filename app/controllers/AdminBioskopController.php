<?php
class AdminBioskopController extends Controller
{

  public function index()
  {
    $data = $this->model('BioskopModel')->getAll();
    $this->view('admin/bioskop/index', $data);
  }

  public function getAll()
  {
    $data = $this->model('BioskopModel')->fetchDatatable();
    echo json_encode($data);
  }

  public function create()
  {
    $this->view('admin/bioskop/create');
  }

  public function store()
  {

    $result = $this->model('BioskopModel')->insert($_POST);
    if ($result > 0) {
      $this->back();
    }
  }

  public function edit(int $id)
  {
    $data = $this->model('BioskopModel')->getById($id);
    $this->view('admin/bioskop/edit', $data);
  }

  public function update(int $id)
  {
    $_POST['id'] = $id;
    $result = $this->model('BioskopModel')->update($_POST);
    if ($result > 0) {
      $this->back();
    }
  }

  public function destroy(int $id)
  {
    $result = $this->model('BioskopModel')->delete($id);
    if ($result > 0) {
      $this->back();
    }
  }

  function back()
  {
    header("Location: /admin/bioskop");
    die();
  }
}
