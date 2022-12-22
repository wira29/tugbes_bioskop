<?php 

class FilmModel 
{
    private $db;

    public function __construct()
    {
        $this->db = Koneksi::getInstance()->getPDO();
    }

    public function getAll()
    {
        $query = "SELECT * FROM film";
        $result = $this->db->query($query);

        return $result->fetchAll();
    }

    public function getPaginate(int $page, int $limit)
    {
        $offset = $page * $limit;

        $query = "SELECT * FROM film LIMIT $limit OFFSET $offset";
        $result = $this->db->query($query);

        return $result->fetchAll();
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM film WHERE id='$id'";
        $result = $this->db->query($query);

        return $result->fetchObject();
    }

    public function getRandom(int $id)
    {
        $query = "SELECT * FROM film WHERE id != '$id' ORDER BY RAND() LIMIT 4";
        $result = $this->db->query($query);

        return $result->fetchAll();
    }
}