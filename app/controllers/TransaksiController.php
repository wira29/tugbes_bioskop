<?php 

require_once __DIR__ . '/../models/TransaksiModel.php';

class TransaksiController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new TransaksiModel();
    }

    public function index()
    {
        $transaksi = $this->model->getTransaksiByUser($_SESSION['user']->id);
        
        foreach($transaksi as $key=>$tr){
            $transaksi[$key]['kursi'] = $this->model->getKursiByTransaksi($tr['id_transaksi']);
        }
        $data = [
            'transaksi' => $transaksi
        ];  
        return $this->view('dashboard/transaksi', $data);
    }
}