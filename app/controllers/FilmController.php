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
        $film = $this->model->getById($id);
        var_dump($film);
    }
}