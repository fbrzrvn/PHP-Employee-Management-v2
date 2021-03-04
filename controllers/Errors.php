<?php

class Errors extends Controller
{
  function __construct($error)
  {
    $this->error = $error;
    parent::__construct();
    $this->view->error = $this->error;
    $this->view->render('Errors/index');
  }
}