<?php
class employeeModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
  }

  function getEmployee($id)
  {
    try {
      $data = $this->pdo->query("SELECT * FROM employees_manager WHERE emp_id=$id")->fetch(PDO::FETCH_ASSOC);
      return $data;

    } catch (PDOException $e) {
      print_r("Error: " . $e->getMessage());
    }
  }

  function updateEmployee($id, $employee)
  {
    try {
      $query = $this->pdo->prepare("UPDATE employees_manager SET
        first_name = :first_name, last_name = :last_name,
        email = : emial, gender = :gender,
        city = :city, street_address = :street_adress,
        state = :state, postal_code = :postal_code,
        phone_number = :phone_number, age = :age
        WHERE emp_id = $id"
      );
      $query->execute([
        'first_name' => $employee['first_name'], 'last_name' => $employee['last_name'],
        'email' => $employee['email'], 'gender' =>  $employee['gender'],
        'city' => $employee['city'], 'street_address' => $employee['street_address'],
        'state' => $employee['state'], 'postal_code' => $employee['postal_code'],
        'phone_number' => $employee['phone_number'], 'age' => $employee['age']
      ]);

      return $query;

    } catch( PDOException $e) {
      print_r('Error: ' . $e->getMessage());
    }
  }

  function createEmployee($employee)
  {
    try {
      $query = $this->pdo->prepare
      (
        "INSERT INTO employees_manager
          (first_name, last_name, email, gender, city, street_address, state, postal_code, phone_number, age)
        VALUES
          (:first_name, :last_name,: emial,:gender, :city,:street_adress, :state, :postal_code, :phone_number, :age)"
      );
      $query->bindParam(':first_name', $employee['first_name']);
      $query->bindParam(':last_name', $employee['last_name']);
      $query->bindParam(':email', $employee['email']);
      $query->bindParam(':gender', $employee['gender']);
      $query->bindParam(':city', $employee['city']);
      $query->bindParam(':street_adress', $employee['street_address']);
      $query->bindParam(':state', $employee['state']);
      $query->bindParam(':postal_code', $employee['postal_code']);
      $query->bindParam(':phone_number', $employee['phone_number']);
      $query->bindParam(':age', $employee['age']);
      $query->execute();

      return $query;

    } catch( PDOException $e) {
      print_r('Error: ' . $e->getMessage());
    }
  }
}