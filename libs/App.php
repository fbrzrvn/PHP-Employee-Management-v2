<?php

define('BASE_PATH', basename('/'));

include './config/constants.php';

class App
{
  function __construct()
  {

    $url = $_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : null;
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    array_shift($url);
    // var_dump($url);

    if(empty($url[0])) {
      $loginControllers = CONTROLLERS . 'Login.php';
      require_once $loginControllers;
      $controller = new Login();
      $controller->loadModel('login');
      return false;
    }

    $loginControllers = CONTROLLERS . $url[0] . '.php';

    if (file_exists($loginControllers)) {
      require_once $loginControllers;
      $controller = new $url[0];
      $controller->loadModel($url[0]);

      if (isset($url[1])) {
        $controller->{ $url[1] }();
      }

    } else {
      echo "Error en metodo";
      //$controller = new Errors();
    }
  }
}
