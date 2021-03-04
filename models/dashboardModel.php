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
    return $this->pdo->query("Select emp_id, first_name, last_name, email, gender, age FROM employees_manager")->fetchAll(PDO::FETCH_ASSOC);
  }

  function remove($emp_id)
  {
    try {
      $sql = "DELETE FROM employees_manager WHERE emp_id = $emp_id";
      $this->pdo->query($sql);

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }

  }

  function insert($employee)
  {
    try {
      $first_name = $employee['first_name'];
      $last_name = $employee['last_name'];
      $email = $employee['email'];
      $age = $employee['age'];
      $gender = $employee['gender'];
      $sql = "INSERT INTO employees_manager (first_name, last_name, email, age, gender)
              VALUES ('$first_name', '$last_name', '$email', $age, '$gender')";
      $this->pdo->query($sql);

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }
  }
}