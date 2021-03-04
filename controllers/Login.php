<?php
    // session_unset();
    // session_destroy();
class login extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->render('login/index');
  }

  function invoke()
  {
  // it call the getlogin() function of model class and store the return value of this function into the reslt variable.
    $user = $this->model->getlogin();
    if ($user != NULL) {
      session_start();
      $_SESSION['user_id'] = $user["user_id"];
      $_SESSION['name'] = $user["name"];
      $_SESSION['loginTime'] = time();
      $_SESSION['timer'] = 600;
      echo $_SESSION['user_id'];
      header("Location: " . URL . "Dashboard/render");
    } else{
      header("Location: " . URL . "Login");
    }
  }

  function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: " . URL . "Login");
  }
}