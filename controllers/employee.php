<?php
class Employee extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $this->view->render('Employee/index');
  }

  function renderEmployee($id)
  {
    $result = $this->model->getEmployee($id);
    $this->view->result = $result;
    $this->view->render('Employee/index');
  }

  function handleRequest()
  {
    switch($_SERVER["REQUEST_METHOD"]) {

      case "POST":
        parse_str(file_get_contents("php://input"), $_POST);
        $this->model->insert($_POST);
        break;

      default:
        break;
    }

    header("Location: " . URL . "Dashboard/render");
  }
}