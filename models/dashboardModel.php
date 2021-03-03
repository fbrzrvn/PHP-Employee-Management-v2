<?php
class dashboardModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
  }

  function getAll(){
    $data = $this->pdo->query("Select emp_id, first_name, last_name, email, gender, age FROM employees_manager")->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  function remove($emp_id) {
    $sql = "DELETE FROM employees_manager WHERE emp_id = $emp_id";
    $this->pdo->query($sql);
  }

  function insert($data){
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $email = $data['email'];
    $age = $data['age'];
    $gender = $data['gender'];
    $sql = "INSERT INTO employees_manager (first_name, last_name, email, age, gender) VALUES('$first_name', '$last_name', '$email', $age, '$gender')";
    $this->pdo->query($sql);
  }
}