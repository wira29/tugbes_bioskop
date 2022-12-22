<?php
class UserModel
{

  private $db;

  function __construct()
  {
    $this->db = Koneksi::getInstance()->getPDO();
  }

  public function getByEmail(string $email)
  {
    $query = "SELECT * from user WHERE email='$email'";
    $result = $this->db->query($query);
    return $result->fetchObject();
  }

  public function getAll()
  {
    $query = "SELECT * FROM users";
    $result = $this->db->query($query);
    return $result->fetchAll();
  }

  public function fetchDatatable()
  {
    $length = $_REQUEST['length'];
    $start = $_REQUEST['start'];
    $colIndex = $_REQUEST['order'][0]['column'];
    $col = $_REQUEST['columns'][$colIndex]['data'];
    $direction = $_REQUEST['order'][0]['dir'];
    $search = $_REQUEST['search']["value"];

    $query = "SELECT * FROM users WHERE name LIKE :keyword  ORDER BY $col $direction LIMIT :offs, :lim";
    $result  = $this->db->prepare($query);
    $result->execute([
      ':keyword' => '%' . $search . '%',
      ':offs' => (int) $start,
      ':lim' => (int)$length
    ]);
    $data = $result->fetchAll();


    $totalRecords = 0;
    if ($search == "") {
      $totalRecords =  $this->db->query("SELECT * FROM users");
    } else {
      $totalRecords = "SELECT * FROM users WHERE name LIKE :keyword";
      $totalRecords  = $this->db->prepare($totalRecords);
      $totalRecords->bindValue(':keyword', '%' . $search . '%', PDO::PARAM_STR);
    }

    $totalRecords->execute();
    $totalRecords = $totalRecords->rowCount();

    $output = array(
      "draw"            => intval($_REQUEST['draw']),
      "recordsTotal"    => $totalRecords,
      "recordsFiltered" => $totalRecords,
      "data"            => $data,
    );

    return $output;
  }



  public function get($id)
  {
    $query = "SELECT * FROM users WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->fetch();
  }
}
