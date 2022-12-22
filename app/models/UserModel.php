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

  public function store(array $data)
  {
    $insert = "INSERT INTO user(nama, email, no_telepon, password, id_role) VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
    $this->db->exec($insert);
  }

  public function getAll()
  {
    $query = "SELECT * FROM user";
    $result = $this->db->query($query);
    return $result->fetchAll();
  }

  public function get($id)
  {
    $query = "SELECT * FROM user WHERE id=:id";
    $result = $this->db->prepare($query);
    $result->execute(['id' => $id]);
    return $result->fetch();
  }

  public function insert($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO user (nama,email,password,no_telepon,foto,id_role) VALUES (:nama,:email,:password,:no_telepon,:foto,:id_role)";
    $result = $this->db->prepare($query);
    $result->execute($data);

    return $result->rowCount();
  }

  public function update($data)
  {
    $data['password'] = md5($data['password']);
    $id = $data['id'];
    unset($data['id']);

    $query = "UPDATE user SET ";
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
    $query = "DELETE FROM user WHERE id=:id";
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
    $query = "SELECT * FROM user WHERE nama LIKE :keyword  ORDER BY $col $direction LIMIT :offs, :lim";
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
      $totalRecords =  $this->db->query("SELECT * FROM user");
    } else {
      $totalRecords = "SELECT * FROM user WHERE name LIKE :keyword";
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
