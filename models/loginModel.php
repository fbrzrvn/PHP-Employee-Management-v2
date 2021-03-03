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
          //log in succesfull, create session
          session_start();
          var_dump($user);
          $_SESSION['userId'] = $user["user_id"];
          $_SESSION['name'] = $user["name"];
          $_SESSION['loginTime'] = time();
          $_SESSION['timer'] = 600;
          //redirect to dashboard
          return 'login';
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