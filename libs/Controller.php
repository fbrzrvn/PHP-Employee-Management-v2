<?php

class Controller
{
  function __construct()
  {
    $this->view = new View();
  }

  function loadModel($model)
  {
    $url = MODELS . $model . 'Model.php';

    // echo "module loaded";

    if (file_exists($url)) {
      require $url;
      $modelName = $model . 'Model';
      $this->model = new $modelName();
    } else {
      echo "Model not found";
    }
  }
}