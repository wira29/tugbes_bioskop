<?php 

require_once __DIR__ . '/../models/FilmModel.php';

class CheckoutController extends Controller
{
    private $filmModel;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
    }
    
    public function index(int $idFilm)
    {
        $data = [
            'film'  => $this->filmModel->getById($idFilm),
        ];
        return $this->view('dashboard/pilih-bioskop', $data);
    }
}