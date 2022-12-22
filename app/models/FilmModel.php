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

  public function insert($data)
  {
    $query = "INSERT INTO film (judul,rating,deskripsi,poster,cover) VALUES (:judul,:rating,:deskripsi,:poster,:cover)";
    $result = $this->db->prepare($query);
    $result->execute($data);

    return $result->rowCount();
  }

  public function update($data)
  {
    $id = $data['id'];
    unset($data['id']);
    $query = "UPDATE film SET ";
    foreach ($data as $key => $val) {
      if ($val) {
        $query .= "$key='$val', ";
      }
    }
    $query = substr_replace($query, " ", -2);
    $query .= " WHERE id=$id";
    $result = $this->db->prepare($query);
    $result->execute();
    return $result->rowCount();
  }

  public function delete($id)
  {
    $query = "DELETE FROM film WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->rowCount();
  }

  public function fetchDatatable()
  {
    $length = $_REQUEST['length'];
    $start = $_REQUEST['start'];
    $colIndex = $_REQUEST['order'][0]['column'];
    $col = $_REQUEST['columns'][$colIndex]['data'];
    $direction = $_REQUEST['order'][0]['dir'];
    $search = $_REQUEST['search']["value"];
    // get data
    $query = "SELECT * FROM film WHERE judul LIKE :keyword  ORDER BY $col $direction LIMIT :offs, :lim";
    $result  = $this->db->prepare($query);
    $result->execute([
      ':keyword' => '%' . $search . '%',
      ':offs' => (int) $start,
      ':lim' => (int)$length
    ]);
    $data = $result->fetchAll();
    // get Total records
    $totalRecords = 0;
    if ($search == "") {
      $totalRecords =  $this->db->query("SELECT * FROM film");
    } else {
      $totalRecords = "SELECT * FROM film WHERE name LIKE :keyword";
      $totalRecords  = $this->db->prepare($totalRecords);
      $totalRecords->bindValue(':keyword', '%' . $search . '%', PDO::PARAM_STR);
    }
    $totalRecords->execute();
    $totalRecords = $totalRecords->rowCount();
    // return data
    $output = array(
      "draw"            => intval($_REQUEST['draw']),
      "recordsTotal"    => $totalRecords,
      "recordsFiltered" => $totalRecords,
      "data"            => $data,
    );

    return $output;
  }
}
