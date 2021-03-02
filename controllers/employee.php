<?php
class Employee extends Controller{
  function __construct()
  {
    parent::__construct();
    //$this->view->render('Employee/index');
    switch($_SERVER["REQUEST_METHOD"]){
      case "GET":
        $this->model->getAll();
        break;
    }
  }
}