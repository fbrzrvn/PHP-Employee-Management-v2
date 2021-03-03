<?php
class employeeModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
  }

  function getEmployee($id){
    $data = $this->pdo->query("Select * FROM employees_manager WHERE emp_id=$id")->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}