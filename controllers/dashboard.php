<?php

class Dashboard extends Controller{
  function __construct()
  {
    parent::__construct();
    $this->view->render('Dashboard/index');
  }

  function fillTable(){
    echo "Working";
    var_dump($this->model->getAll());
  }
}