<?php

class Dashboard extends Controller{
  function __construct()
  {
    parent::__construct();
  }

  function render(){
    $this->view->render('Dashboard/index');
  }

  function fillTable(){
    $result = json_encode($this->model->getAll());
    echo $result;
    //return $result;
  }

  function handleRequest(){
    switch($_SERVER["REQUEST_METHOD"]){
      case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        $result = $this->model->remove(intval($_DELETE['emp_id']));
        break;
      case "POST":
        parse_str(file_get_contents("php://input"), $_POST);
        var_dump($_POST);
        $result = $this->model->insert(array(
          "first_name" => $_POST["first_name"],
          "last_name" => $_POST["last_name"],
          "email" => $_POST["email"],
          "age" => intval($_POST["age"]),
          "gender" => $_POST["gender"]
        ));
        break;
    }
  }
}