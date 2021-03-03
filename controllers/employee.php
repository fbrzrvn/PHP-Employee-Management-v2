<?php
class Employee extends Controller{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $this->view->render('Employee/index');
  }

  function renderEmployee($id)
  {
    $result = $this->model->getEmployee($id);
    $this->view->result = $result;
    $this->view->render('Employee/index');
  }
}