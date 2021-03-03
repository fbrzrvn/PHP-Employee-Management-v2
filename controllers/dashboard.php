<?php

class Dashboard extends Controller{
  function __construct()
  {
    parent::__construct();
    $this->view->render('Dashboard/index');
  }

  function fillTable(){
    $result = $this->model->getAll();
    var_dump($result);
    // return json_encode($result);
  }
}