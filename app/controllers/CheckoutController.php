<?php

require_once __DIR__ . '/../models/FilmModel.php';
require_once __DIR__ . '/../models/CheckoutModel.php';

class CheckoutController extends Controller
{
  private $filmModel;
  private $model;

  public function __construct()
  {
    $this->filmModel = new FilmModel();
    $this->model = new CheckoutModel();
  }

  public function index(int $idFilm)
  {

    $data = [
      'tanggal' => $this->model->getTanggal($idFilm),
      'film'  => $this->filmModel->getById($idFilm),
    ];
    return $this->view('dashboard/pilih-bioskop', $data);
  }

  public function pilihKursi(int $id)
  {
    $jadwal = $this->model('JadwalModel')->getById($id);
    $detailTransaksi = $this->model->getBookedSeatByJadwal($id);
    $bookedSeats = array();
    foreach ($detailTransaksi as $dt) {
      array_push($bookedSeats, $dt['kursi']);
    }
    return $this->view('dashboard/pilih-kursi', ['jadwal' => $jadwal, 'bookedSeats' => $bookedSeats]);
  }

  public function getJadwal()
  {
    $idFilm = $_POST['id_film'];
    $tanggal = $_POST['tanggal'];
    $bioskop = $this->model->getBioskopByFilm($idFilm, $tanggal);
    foreach ($bioskop as $idx => $b) {
      $bioskop[$idx]['teater'] = $this->model->getTeaterByBioskop($b['id']);
      foreach ($bioskop[$idx]['teater'] as $id => $t) {
        $bioskop[$idx]['teater'][$id]['waktu'] = $this->model->getJadwalByTeaterAndFilm($idFilm, $tanggal, $t['id']);
      }
    }
    print_r(json_encode($bioskop));
    return json_encode($bioskop);
  }

  public function storeJadwal()
  {
    var_dump($_POST['selectedSeat']);
    // $result = $this->model->insert($_POST);
    // if ($result > 0) {
    //   $this->back($_POST['id_teater']);
    // }
  }
}
