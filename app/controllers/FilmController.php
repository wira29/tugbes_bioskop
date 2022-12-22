<?php 

class FilmController extends Controller
{

    /**
     * show index view for film
     */
    public function index()
    {
        return $this->view('dashboard/film');
    }
}