<?php

include './config/db.php';

class Database
{
  private $host;
  private $username;
  private $password;
  private $database;

  function __construct()
  {
    $this->host = HOST;
    $this->username = USERNAME;
    $this->password = PASSWORD;
    $this->database = DATABASE;
  }

  function connect()
  {
    try {
      $connection = "mysql:host=" . $this->host . ";dbname=" . $this->database;
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
      ];
      return new PDO($connection, $this->username, $this->password, $options);

    } catch(PDOException $e) {
      print_r('Error Connection: ' . $e->getMessage());
    }
  }
}