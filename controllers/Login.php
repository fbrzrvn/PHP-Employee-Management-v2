<?php
class login extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->render('login/index');
  }

  function invoke(){
  // it call the getlogin() function of model class and store the return value of this function into the reslt variable.
    $result = $this->model->getlogin();
    if($result == 'login'){
    echo "<br>log in";
    //TODO call dashboard view
    header("Location: " . URL . "Dashboard");
    }
    else{
    echo '<br> ERROR';
    }
  }
}