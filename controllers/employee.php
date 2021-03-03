<?php
class Employee extends Controller{
  function __construct()
  {
    parent::__construct();
    $this->view->render('Employee/index');
  }
}