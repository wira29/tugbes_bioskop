<?php

class JadwalModel
{
  private $db;

  public function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getAll()
  {
    $query = "SELECT * FROM jadwal";
    $result = $this->db->query($query);

    return $result->fetchAll();
  }

  public function getById(int $id)
  {
    $query = "SELECT * FROM jadwal WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->fetch();
  }


  public function getByIdAndTeater(int $id, int $id_teater)
  {
    $joinQuery = "SELECT jadwal.*,film.judul judul_film,teater.nama_teater nama_teater FROM jadwal
INNER JOIN film ON film.id = jadwal.id_film
INNER JOIN teater ON teater.id=jadwal.id_teater ";
    $query = $joinQuery . "WHERE jadwal.id=:id AND id_teater=:id_teater";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id, 'id_teater' => $id_teater]);
    return $result->fetch();
  }

  public function insert($data)
  {
    $query = "INSERT INTO jadwal (id_film,id_teater,waktu,tanggal,harga) VALUES (:id_film,:id_teater,:waktu,:tanggal,:harga)";
    $result = $this->db->prepare($query);
    $result->execute($data);

    return $result->rowCount();
  }

  public function update($data)
  {
    $id = $data['id'];
    unset($data['id']);
    $query = "UPDATE jadwal SET ";
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

  public function delete(int $id)
  {
    $query = "DELETE FROM jadwal WHERE id=:id";
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
    $query = "SELECT * FROM jadwal WHERE nama LIKE :keyword  ORDER BY $col $direction LIMIT :offs, :lim";
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
      $totalRecords =  $this->db->query("SELECT * FROM jadwal");
    } else {
      $totalRecords = "SELECT * FROM jadwal WHERE nama LIKE :keyword";
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

  public function fetchDatatableByTeater(int $id_teater)
  {
    $length = $_REQUEST['length'];
    $start = $_REQUEST['start'];
    $colIndex = $_REQUEST['order'][0]['column'];
    $col = $_REQUEST['columns'][$colIndex]['data'];
    $direction = $_REQUEST['order'][0]['dir'];
    $search = $_REQUEST['search']["value"];
    // get data
    $joinQuery = "SELECT jadwal.*,film.judul judul_film,teater.nama_teater nama_teater FROM jadwal
INNER JOIN film ON film.id = jadwal.id_film
INNER JOIN teater ON teater.id=jadwal.id_teater ";
    $query = $joinQuery . "WHERE tanggal LIKE :keyword AND id_teater=:id_teater ORDER BY $col $direction LIMIT :offs, :lim ";
    $result  = $this->db->prepare($query);
    $result->execute([
      ':keyword' => '%' . $search . '%',
      ':offs' => (int) $start,
      ':lim' => (int)$length,
      ':id_teater' => (int)$id_teater
    ]);
    $data = $result->fetchAll();
    // get Total records
    $totalRecords = 0;
    if ($search == "") {
      $totalRecords =  $this->db->prepare($joinQuery . "WHERE id_teater=:id_teater");
      $totalRecords->bindValue(':id_teater', $id_teater, PDO::PARAM_INT);
    } else {
      $totalRecords = $joinQuery . "WHERE tanggal LIKE :keyword AND id_teater=:id_teater";
      $totalRecords  = $this->db->prepare($totalRecords);
      $totalRecords->bindValue(':keyword', '%' . $search . '%', PDO::PARAM_STR);
      $totalRecords->bindValue(':id_teater', $id_teater, PDO::PARAM_INT);
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
