<?php
class AdminUserController extends Controller
{

  public function index()
  {
    $data = $this->model('UserModel')->getAll();
    $this->view('admin/user/index', $data);
  }

  public function getAll()
  {
    $data = $this->model('UserModel')->fetchDatatable();

    echo json_encode($data);
  }

  public function create()
  {
    $this->view('admin/user/create');
  }

  public function store()
  {

    if ($_FILES['foto']['size'] > 0) {
      $uploadedFile = $this->uploadFile($_FILES['foto']);
      $_POST['foto'] = $uploadedFile;
    }
    $result = $this->model('UserModel')->insert($_POST);
    if ($result > 0) {
      $this->back();
    }
  }

  public function edit($id)
  {
    $data = $this->model('UserModel')->getById($id);
    $this->view('admin/user/edit', $data);
  }

  public function show($id)
  {
    echo "hello";
    var_dump($id);
    // $data = $this->model('UserModel')->get($id);
    // $this->view('admin/user', $data);
  }

  public function update($id)
  {
    $_POST['id'] = $id;
    if ($_FILES['foto']['size'] > 0) {
      $uploadedFile = $this->uploadFile($_FILES['foto']);

      if ($uploadedFile) {
        $old = $this->model('UserModel')->getById($id);
        $this->removeFile($old['foto']);
      }

      $_POST['foto'] = $uploadedFile;
    }
    $result = $this->model('UserModel')->update($_POST);
    if ($result > 0) {
      $this->back();
    }
  }

  public function destroy($id)
  {
    $data = $this->model('UserModel')->getById($id);

    if ($data['foto']) {
      $this->removeFile($data['foto']);
    }

    $result = $this->model('UserModel')->delete($id);
    if ($result > 0) {
      $this->back();
    }
  }

  function uploadFile($file)
  {
    try {
      $name = $file['name'];
      $ext = pathinfo($name, PATHINFO_EXTENSION);
      $temp = $file['tmp_name'];
      $fileName = uniqid() . '.' . $ext;
      move_uploaded_file($temp, getcwd() . '/assets/img/user/' . $fileName);
      return $fileName;
    } catch (\Throwable $th) {
      echo $th;
      throw $th;
    }
  }

  function removeFile($file)
  {
    unlink(getcwd() . '/assets/img/user/' . $file);
  }

  function back()
  {
    header("Location: /admin/user");
    die();
  }
}
