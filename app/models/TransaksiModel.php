<?php

class TransaksiModel
{
  private $db;

  public function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getAll()
  {
    $query = "SELECT transaksi.*,user.nama nama_user FROM transaksi 
INNER JOIN user ON user.id=transaksi.id_user
";
    $result = $this->db->query($query);

    return $result->fetchAll();
  }

  public function getById(int $id)
  {
    $query = "SELECT transaksi.*,user.nama nama_user,jadwal.waktu waktu_jadwal,jadwal.tanggal tanggal_jadwal,jadwal.harga harga_tiket,film.judul judul_film FROM transaksi 
INNER JOIN user ON user.id=transaksi.id_user
INNER JOIN jadwal ON jadwal.id=transaksi.id_jadwal
INNER JOIN film ON film.id=jadwal.id_film
 WHERE transaksi.id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->fetch();
  }


  public function insert($data)
  {
    $query = "INSERT INTO transaksi (id_user,id_jadwal ) VALUES (:nama,:alamat)";
    $result = $this->db->prepare($query);
    $result->execute($data);

    return $result->rowCount();
  }

  public function update($data)
  {
    $id = $data['id'];
    unset($data['id']);
    $query = "UPDATE transaksi SET ";
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
    $query = "DELETE FROM transaksi WHERE id=:id";
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
    $queryJoin = "SELECT transaksi.*,user.nama nama_user FROM transaksi 
INNER JOIN user ON user.id=transaksi.id_user ";
    $query =  $queryJoin . "WHERE tanggal_transaksi LIKE :keyword  ORDER BY $col $direction LIMIT :offs, :lim";
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
      $totalRecords =  $this->db->query("SELECT * FROM transaksi");
    } else {
      $totalRecords =  $queryJoin . "WHERE tanggal_transaksi LIKE :keyword";
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
