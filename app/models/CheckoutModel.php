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

  public function getBookedSeatByJadwal(int $idJadwal)
  {
    $query = "SELECT detail_transaksi.kursi FROM detail_transaksi
INNER JOIN transaksi ON detail_transaksi.id_transaksi=transaksi.id
INNER JOIN jadwal ON transaksi.id_jadwal=jadwal.id
WHERE jadwal.id=:idJadwal;";
    $result = $this->db->prepare($query);
    $result->execute(['idJadwal' => $idJadwal]);
    return $result->fetchAll();
  }

  public function getTanggal(int $idFilm)
  {
    $sql = "SELECT distinct(tanggal) FROM jadwal where id_film = '$idFilm' and tanggal >= curdate()";
    $result = $this->db->query($sql);

    return $result->fetchAll();
  }
}
