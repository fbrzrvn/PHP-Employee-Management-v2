<?php
class dashboardModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
  }

  function getAll()
  {
    $data = $this->pdo->query("Select emp_id, first_name, last_name, email, gender, age FROM employees_manager")->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  function deleteEmployee($id)
  {
    try {
      $data = $this->pdo->query("DELETE FROM employees_manager WHERE emp_id=$id")->fetch(PDO::FETCH_ASSOC);
      return $data;

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }
  }
}