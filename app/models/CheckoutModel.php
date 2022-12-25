<?php

class CheckoutModel
{
  private $db;

  public function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getJadwalByFilm(int $idFilm, string $tanggal)
  {
    $sql = "SELECT * FROM jadwal where id_film = '$idFilm' and tanggal = '$tanggal'";
    $result = $this->db->query($sql);

    return $result->fetchAll();
  }
}