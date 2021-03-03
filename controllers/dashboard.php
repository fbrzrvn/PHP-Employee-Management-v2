<?php

class Dashboard extends Controller{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $this->view->render('Dashboard/index');
  }

  function renderTable()
  {
    echo json_encode($this->model->getAll());
  }
}