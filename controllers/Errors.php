<?php

class Errors extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->render('errors/index');
  }
}