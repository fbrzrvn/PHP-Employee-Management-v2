<?php

class View
{
  function __construct()
  {
  }

  function render($view)
  {
    require VIEWS . $view . '.php';
  }
}