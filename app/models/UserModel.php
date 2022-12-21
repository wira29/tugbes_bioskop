<?php
class UserModel
{

  private $db;

  function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getAll()
  {
    $query = "SELECT * FROM users";
    $result = $this->db->query($query);
    return $result->fetchAll();
  }

  public function get($id)
  {
    $query = "SELECT * FROM users WHERE id=:id";
    $result = $this->db->prepare($query)->execute(['id' => $id]);
    return $result;
  }
}
