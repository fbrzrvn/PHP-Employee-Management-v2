<?php

class Controller
{
  function __construct()
  {
    echo "<p>Basic Controller</p>";
    $this->view = new View();
  }

  function loadModel($model)
  {
    $url = MODELS . $model . 'Model.php';

    echo "module loaded";

    if (file_exists($url)) {
      require $url;
      $modelName = $model . 'Model';
      $this->model = new $modelName();
      echo "<pre>";
      echo $this->model->getUser()[0]['email'];
    } else {
      echo "Model not found";
    }
  }
}