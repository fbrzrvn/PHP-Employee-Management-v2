<?php

class loginModel extends Database
{
  function __construct()
  {
    parent::__construct();
    $this->pdo = $this->connect();
  }

  function getUser()
  {
    $data = $this->pdo->query("Select * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  public function getlogin()
  {
    //get email user inserted
    $email = $_POST['emailInput'];
    //get password user inserted
    $password = $_POST['passwordInput'];
    if (empty($email) || empty($password)){
      //TODO ERROR
      echo "Error en login";
      //exit();
    }
    //redirect to index with error
    else{
      $users = $this->getUser();
      foreach($users as $user) {
        //check for each user if email and password is a math
        if ($email== $user["email"] && $password == $user["password"]) {
          return $user;
        } else {
          //if error sent back to index
          echo "error";
          //header("Location: ../../index.php?error=wrongCredentias");
          exit();
        }
      }
    }
  }
}