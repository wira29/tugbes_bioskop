<?php
class AdminFilmController extends Controller
{

  public function index()
  {
    $data = $this->model('FilmModel')->getAll();
    $this->view('admin/film/index', $data);
  }

  public function getAll()
  {
    $data = $this->model('FilmModel')->fetchDatatable();

    echo json_encode($data);
  }

  public function create()
  {
    $this->view('admin/film/create');
  }

  public function store()
  {

    if ($_FILES['poster']['size'] > 0) {
      $uploadedFile = $this->uploadFile($_FILES['poster'], 'poster/');
      $_POST['poster'] = $uploadedFile;
    }
    if ($_FILES['cover']['size'] > 0) {
      $uploadedFile = $this->uploadFile($_FILES['cover'], 'cover/');
      $_POST['cover'] = $uploadedFile;
    }
    $result = $this->model('FilmModel')->insert($_POST);
    if ($result > 0) {
      $this->back();
    }
  }

  public function edit($id)
  {
    $data = $this->model('FilmModel')->getById($id);
    $this->view('admin/film/edit', $data);
  }

  public function show($id)
  {
    echo "hello";
    var_dump($id);
    // $data = $this->model('FilmModel')->get($id);
    // $this->view('admin/film', $data);
  }

  public function update($id)
  {
    $_POST['id'] = $id;
    if ($_FILES['poster']['size'] > 0) {
      $uploadedFile = $this->uploadFile($_FILES['poster'], 'poster/');
      if ($uploadedFile) {
        $old = $this->model('FilmModel')->getById($id);
        $this->removeFile($old->poster, 'poster/');
      }
      $_POST['poster'] = $uploadedFile;
    }

    if ($_FILES['cover']['size'] > 0) {
      $uploadedFile = $this->uploadFile($_FILES['cover'], 'cover/');
      if ($uploadedFile) {
        $old = $this->model('FilmModel')->getById($id);
        $this->removeFile($old->cover, 'cover/');
      }
      $_POST['cover'] = $uploadedFile;
    }
    $result = $this->model('FilmModel')->update($_POST);
    if ($result > 0) {
      $this->back();
    }
  }

  public function destroy($id)
  {
    $data = $this->model('FilmModel')->getById($id);
    if ($data->poster) {
      $this->removeFile($data->poster, 'poster/');
    }
    if ($data->poster) {
      $this->removeFile($data->cover, 'cover/');
    }

    $result = $this->model('FilmModel')->delete($id);
    if ($result > 0) {
      $this->back();
    }
  }

  function uploadFile($file, $folder)
  {
    try {
      $name = $file['name'];
      $ext = pathinfo($name, PATHINFO_EXTENSION);
      $temp = $file['tmp_name'];
      $fileName = uniqid() . '.' . $ext;
      move_uploaded_file($temp, getcwd() . '/assets/img/film/' . $folder . $fileName);
      return $fileName;
    } catch (\Throwable $th) {
      echo $th;
      throw $th;
    }
  }

  function removeFile($file, $folder)
  {
    unlink(getcwd() . '/assets/img/film/' . $folder . $file);
  }

  function back()
  {
    header("Location: /admin/film");
    die();
  }
}
