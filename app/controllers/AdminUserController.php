<?php

class AdminUserController extends Controller
{

  public function index()
  {
    $data = $this->model('UserModel')->getAll();
    $this->view('admin/user', $data);
  }

  public function show($id)
  {
    echo "hello";
    var_dump($id);
    // $data = $this->model('UserModel')->get($id);
    // $this->view('admin/user', $data);
  }
}
