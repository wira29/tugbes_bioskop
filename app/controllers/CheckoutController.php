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
        $d = $this->model->getJadwalByFilm($idFilm, '2022-12-26');
        // $teater = array_merge_recursive($d[0], $d[1]);
        // print_r($teater);
        $teater = [1];
        foreach($d as $d){
            $teater[$d['id_teater']] = [$teater[$d['id_teater']], $d['waktu']];
        }
        print_r($teater);
        die();
        $data = [
            'film'  => $this->filmModel->getById($idFilm),
        ];
        return $this->view('dashboard/pilih-bioskop', $data);
    }
}