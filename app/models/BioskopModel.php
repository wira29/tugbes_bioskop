<?php

class BioskopModel
{
  private $db;

  public function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getAll()
  {
    $query = "SELECT * FROM bioskop";
    $result = $this->db->query($query);

    return $result->fetchAll();
  }

  public function getById(int $id)
  {
    $query = "SELECT * FROM bioskop WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->fetch();
  }


  public function insert($data)
  {
    $query = "INSERT INTO bioskop (nama,alamat) VALUES (:nama,:alamat)";
    $result = $this->db->prepare($query);
    $result->execute($data);

    return $result->rowCount();
  }

  public function update($data)
  {
    $id = $data['id'];
    unset($data['id']);
    $query = "UPDATE bioskop SET ";
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
    $query = "DELETE FROM bioskop WHERE id=:id";
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
    $query = "SELECT * FROM bioskop WHERE nama LIKE :keyword  ORDER BY $col $direction LIMIT :offs, :lim";
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
      $totalRecords =  $this->db->query("SELECT * FROM bioskop");
    } else {
      $totalRecords = "SELECT * FROM bioskop WHERE nama LIKE :keyword";
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
