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
    $reslt = $this->model->getlogin();
    if($reslt == 'login'){
    echo "<br>log in";
    }
    else{
    echo '<br> ERROR';
    }
  }
}