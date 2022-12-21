<?php

class UserController extends Controller
{

  public function index()
  {
    $uri = $_SERVER["REQUEST_URI"];
    if ($uri == '/' || $uri == '/login') {
      $this->view('login');
    } else if ($uri == '/register') {
      $this->view('register');
    }
    // $data = $this->model('UserModel')->getAll();
    // $this->view('login', $data);
  }

  public function show($id)
  {
    echo "hello";
    var_dump($id);
    // $data = $this->model('UserModel')->get($id);
    // $this->view('admin/user', $data);
  }
}
