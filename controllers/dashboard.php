<?php

class Dashboard extends Controller
{
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

  function handleRequest()
  {
    switch($_SERVER["REQUEST_METHOD"]) {

      case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        $this->model->remove(intval($_DELETE['emp_id']));
        break;

      case "POST":
        parse_str(file_get_contents("php://input"), $_POST);
        var_dump($_POST);
        $this->model->insert(array(
          "first_name" => $_POST["first_name"],
          "last_name" => $_POST["last_name"],
          "email" => $_POST["email"],
          "age" => intval($_POST["age"]),
          "gender" => $_POST["gender"]
        ));
        break;

      default:
        break;
    }
  }
}