<?php

class View
{
  function __construct()
  {
    echo "<p>Basic View</p>";
  }

  function render($view)
  {
    require VIEWS . $view . '.php';
  }
}