<?php
class DetailTransaksiModel
{

  private $db;

  function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }



  public function getAll()
  {
    $query = "SELECT * FROM detail_transaksi";
    $result = $this->db->query($query);
    return $result->fetchAll();
  }

  public function getById(int $id)
  {
    $query = "SELECT * FROM detail_transaksi WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->fetch();
  }

  public function getByTransaksi(int $id_transaksi)
  {
    $query = "SELECT * from detail_transaksi WHERE id_transaksi='$id_transaksi'";
    $result = $this->db->query($query);
    return $result->fetchAll();
  }

  public function insert($data)
  {
    $query = "INSERT INTO detail_transaksi(id_transaksi,kursi) VALUES(:id_transaksi,:kursi)";
    $result = $this->db->prepare($query);
    $result->execute($data);

    return $result->rowCount();
  }

  public function update($data)
  {
    $id = $data['id'];
    unset($data['id']);

    $query = "UPDATE detail_transaksi SET ";
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
    $query = "DELETE FROM detail_transaksi WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->rowCount();
  }
}
