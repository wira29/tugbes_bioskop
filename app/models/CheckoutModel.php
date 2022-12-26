<?php

class CheckoutModel
{
  private $db;

  public function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getBioskopByFilm(int $idFilm, string $tanggal)
  {
    $sql = "SELECT distinct(b.id), b.nama, b.alamat FROM jadwal j 
            join teater t on t.id = j.id_teater 
            join bioskop b on b.id = t.id_bioskop
            where id_film = '$idFilm' and tanggal = '$tanggal'";
    $result = $this->db->query($sql);

    return $result->fetchAll();
  }

  public function getTeaterByBioskop(int $idBioskop)
  {
    $sql = "SELECT * FROM teater where id_bioskop = $idBioskop";
    $result = $this->db->query($sql);

    return $result->fetchAll();
  }

  public function getJadwalByTeaterAndFilm(int $idFilm, string $tanggal, int $idTeater)
  {
    $sql = "SELECT * FROM jadwal where id_film = '$idFilm' and tanggal = '$tanggal' and id_teater = '$idTeater'";
    $result = $this->db->query($sql);

    return $result->fetchAll();
  }

  public function getTanggal(int $idFilm)
  {
    $sql = "SELECT distinct(tanggal) FROM jadwal where id_film = '$idFilm' and tanggal >= curdate()";
    $result = $this->db->query($sql);

    return $result->fetchAll();
  }
}