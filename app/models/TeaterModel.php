<?php

class TeaterModel
{
  private $db;

  public function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getAll(int $id_bioskop)
  {
    $query = "SELECT * FROM teater WHERE id_bioskop='$id_bioskop'";
    $result = $this->db->query($query);

    return $result->fetchAll();
  }

  public function getById(int $id)
  {
    $query = "SELECT * FROM teater WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->fetch();
  }

  public function getByIdAndBioskop(int $id, int $id_bioskop)
  {
    $query = "SELECT * FROM teater WHERE id=:id AND id_bioskop=:id_bioskop";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id, 'id_bioskop' => $id_bioskop]);
    return $result->fetch();
  }

  public function insert($data)
  {
    $query = "INSERT INTO teater (nama_teater,id_bioskop) VALUES (:nama_teater,:id_bioskop)";
    $result = $this->db->prepare($query);
    $result->execute($data);

    return $result->rowCount();
  }

  public function update($data)
  {
    $id = $data['id'];
    unset($data['id']);
    $query = "UPDATE teater SET ";
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
    $query = "DELETE FROM teater WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->rowCount();
  }

  public function fetchDatatable(int $id_bioskop)
  {
    $length = $_REQUEST['length'];
    $start = $_REQUEST['start'];
    $colIndex = $_REQUEST['order'][0]['column'];
    $col = $_REQUEST['columns'][$colIndex]['data'];
    $direction = $_REQUEST['order'][0]['dir'];
    $search = $_REQUEST['search']["value"];
    // get data
    $query = "SELECT * FROM teater WHERE nama_teater LIKE :keyword AND id_bioskop=:id_bioskop  ORDER BY $col $direction LIMIT :offs, :lim ";
    $result  = $this->db->prepare($query);
    $result->execute([
      ':keyword' => '%' . $search . '%',
      ':offs' => (int) $start,
      ':lim' => (int)$length,
      ':id_bioskop' => (int)$id_bioskop
    ]);
    $data = $result->fetchAll();
    // get Total records
    $totalRecords = 0;
    if ($search == "") {
      $totalRecords =  $this->db->prepare("SELECT * FROM teater WHERE id_bioskop=:id_bioskop");
      $totalRecords->bindValue(':id_bioskop', $id_bioskop, PDO::PARAM_INT);
    } else {
      $totalRecords = "SELECT * FROM teater WHERE nama_teater LIKE :keyword AND id_bioskop=:id_bioskop";
      $totalRecords  = $this->db->prepare($totalRecords);
      $totalRecords->bindValue(':keyword', '%' . $search . '%', PDO::PARAM_STR);
      $totalRecords->bindValue(':id_bioskop', $id_bioskop, PDO::PARAM_INT);
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
