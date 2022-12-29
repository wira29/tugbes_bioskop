<?php

require_once __DIR__ . '/../models/FilmModel.php';

class HomeController extends Controller
{
  private $filmModel;

  public function __construct()
  {
    $this->filmModel = new FilmModel();
  }

  public function index()
  {
    $data = [
      'bestFilm' => $this->filmModel->getBestFilm()
    ];
    return $this->view('dashboard/home', $data);
  }

  public function adminIndex()
  {
    return $this->view('admin/dashboard');
  }

  public function contact()
  {
    return $this->view('dashboard/contact');
  }
}
