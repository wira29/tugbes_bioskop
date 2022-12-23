<?php

class HomeController extends Controller
{

  public function index()
  {
    return $this->view('dashboard/home');
  }

  public function adminIndex()
  {
    return $this->view('admin/dashboard');
  }
}
