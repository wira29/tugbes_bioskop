<?php 

require_once __DIR__ . '/../models/FilmModel.php';

class FilmController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new FilmModel();
    }

    /**
     * show index view for film
     * 
     * @param int $page
     */
    public function index(int $page = 1)
    {
        $limit = 8;

        $data = [
            'films' => $this->model->getPaginate($page - 1, $limit),
            'total' => count($this->model->getAll()),
            'page'  => $page,
            'limit' => $limit
        ];
        return $this->view('dashboard/film', $data);
    }

    /**
     * show film
     * 
     * @param int $id
     */
    public function show(int $id)
    {
        $data = [
            'film'  => $this->model->getById($id),
            'lainnya' => $this->model->getRandom($id)
        ];
        
        return $this->view('dashboard/detail-film', $data);
    }

    public function search()
    {
        $cari = $_POST['film'];

        $data = [
            'films' => $this->model->searchFilm($cari)
        ];
        
        return $this->view('dashboard/film', $data);
    }
}