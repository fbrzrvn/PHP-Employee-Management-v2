<?php

class userModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
  }

  function getAll()
  {
    $data = $this->pdo->query("SELECT user_id, name, email FROM users")->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  function getUser($id)
  {
    try {
      $data = $this->pdo->query("SELECT * FROM users WHERE user_id=$id")->fetch(PDO::FETCH_ASSOC);
      return $data;

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }
  }

  function remove($user_id)
  {
    try {
      $sql = "DELETE FROM users WHERE user_id = $user_id";
      $this->pdo->query($sql);

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }

  }

  function insert($data)
  {
    try {
      $name = $data['name'];
      $email = $data['email'];
      $password = $data['password'];
      $sql = "INSERT INTO users (name, email, password)
              VALUES ('$name', '$email', '$password')";
      $this->pdo->query($sql);

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }
  }
}