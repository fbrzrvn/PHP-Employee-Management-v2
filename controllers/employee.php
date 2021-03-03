<?php
class Employee extends Controller{
  function __construct()
  {
    parent::__construct();
  }

  function render(){
    $this->view->render('Employee/index');
  }

  function fillEmployee($id){
    $result = $this->model->getEmployee($id);
    $this->view->result = $result;
    $this->view->render('Employee/index');
    echo $result['first_name'];
    //var_dump($result);
  }
}