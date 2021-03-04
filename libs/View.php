<?php

class View
{
  function render($view)
  {
    require VIEWS . $view . '.php';
  }
}