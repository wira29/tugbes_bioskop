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

  public function insertTransaksi(int $idUser, int $idJadwal, int $totalHarga)
  {
    $sql = "INSERT INTO transaksi(id_user, id_jadwal, tanggal_transaksi, total_harga)
          VALUES('$idUser', '$idJadwal', CURDATE(), '$totalHarga')";
    $this->db->exec($sql);

    $query = 'SELECT * FROM transaksi WHERE id = LAST_INSERT_ID()';
    $result = $this->db->query($query);

    return $result->fetchObject();
  }

  public function clearKursi(int $idTransaksi)
  {
    $sql = "DELETE FROM detail_transaksi WHERE id_transaksi = '$idTransaksi'";
    $this->db->exec($sql);
  }

  public function insertKursi(int $idTransaksi, string $kursi)
  {
    $sql = "INSERT INTO detail_transaksi(id_transaksi, kursi) VALUES('$idTransaksi', '$kursi')";
    $this->db->exec($sql);
  }

  public function updateTransaksi(int $idTransaksi, int $harga)
  {
    $sql = "UPDATE transaksi SET total_harga='$harga' WHERE id = '$idTransaksi'";
    $this->db->exec($sql);
  }

  public function getTransaksiById(int $idTransaksi)
  {
    $query = "SELECT tr.id as id_transaksi, tr.tanggal_transaksi, tr.total_harga, j.waktu, j.tanggal, j.harga, t.nama_teater, b.nama, b.alamat, f.judul, f.rating, f.deskripsi, f.poster, f.cover FROM transaksi tr 
    inner join jadwal j on j.id = tr.id_jadwal
    inner join teater t on t.id = j.id_teater
    inner join bioskop b on b.id = t.id_bioskop
    inner join film f on f.id = j.id_film
    WHERE tr.id = '$idTransaksi'";
    $result = $this->db->query($query);

    return $result->fetchObject();
  }

  public function getKursiByTransaksi(int $idTransaksi)
  {
    $query = "SELECT * FROM detail_transaksi WHERE id_transaksi = '$idTransaksi'";
    $result = $this->db->query($query);

    return $result->fetchAll();
  }
}
