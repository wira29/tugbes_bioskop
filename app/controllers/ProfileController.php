<?php

require_once __DIR__ . '/../models/UserModel.php';

class ProfileController extends Controller
{

  private $model;

  public function __construct()
  {
    $this->model = new UserModel();
  }

  /**
   * show index page for profile
   */
  public function index()
  {
    return $this->view('dashboard/profile');
  }

  /**
   * show edit form
   */
  public function edit()
  {
    $user = $this->model->getById($_SESSION['user']->id);

    return $this->view('dashboard/edit-profile', $user);
  }

  public function update()
  {
    $_POST['id'] = $_SESSION['user']->id;
    $user = $this->model->getById($_SESSION['user']->id);
    if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
      $ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg');
      $nama = $_FILES['foto']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran  = $_FILES['foto']['size'];
      $file_tmp = $_FILES['foto']['tmp_name'];

      if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        if ($ukuran < 104407000) {
          $newName =   strtotime(date("Y-m-d H:i:s")) . '_' . $nama;
          $dest = 'assets/img/user/' . $newName;
          move_uploaded_file($file_tmp, $dest);

          if ($user['foto'] != null) unlink('assets/img/user/' . $user['foto']);

          $_POST['foto'] = $newName;
        } else {
          echo 'UKURAN FILE TERLALU BESAR';
        }
      } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
    }

    $result = $this->model->update($_POST);
    if ($result > 0) {
      $updateduser = $this->model->getByEmail($user['email']);
      $_SESSION['user'] = $updateduser;
      $this->back();
    }
  }

  function back()
  {
    $url = Helper::baseUrl('profile');
    header("Location: " . $url);
    die();
  }
}
