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
    return $this->pdo->query("SELECT user_id, name, email FROM users")->fetchAll(PDO::FETCH_ASSOC);
  }

  function getUser($id)
  {
    try {
      return $this->pdo->query("SELECT * FROM users WHERE user_id=$id")->fetch(PDO::FETCH_ASSOC);

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

  function insert($user)
  {
    try {
      $name = $user['name'];
      $email = $user['email'];
      $password = $user['password'];
      $sql = "INSERT INTO users (name, email, password)
              VALUES ('$name', '$email', '$password')";
      $this->pdo->query($sql);

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }
  }

  function update($user)
  {
    try {
      $id = $user['user_id'];
      $email = $user['email'];
      $password = $user['password'];
      $name = $user['name'];
      $sql = "UPDATE users SET email = '$email', password = '$password', name ='$name' WHERE user_id=$id";
      $this->pdo->query($sql);

    } catch( PDOException $e) {
      print_r('Error: ' . $e->getMessage());
    }
  }
}