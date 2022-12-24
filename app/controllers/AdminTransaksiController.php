<?php
class AdminTransaksiController extends Controller
{

  public function index()
  {
    $this->view('admin/transaksi/index');
  }
  public function getAll()
  {
    $data = $this->model('TransaksiModel')->fetchDatatable();

    echo json_encode($data);
  }
  public function show($id)
  {
    $transaksi = $this->model('TransaksiModel')->getById($id);
    $detailTransaksi = $this->model('DetailTransaksiModel')->getByTransaksi($id);
    $this->view('admin/transaksi/detail', ['transaksi' => $transaksi, 'detailTransaksi' => $detailTransaksi]);
  }
}
