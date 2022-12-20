<?php
class Koneksi
{
  private static $instance;
  private $pdo;
  private $username = "root";
  private $password = "fakyu";
  private $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  private function __construct()
  {
    $this->pdo = new PDO('mysql:host=localhost;dbname=dummy', $this->username, $this->password, $this->options);
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function getPDO()
  {
    return $this->pdo;
  }
}
