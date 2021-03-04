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

  function createEmployee()
  {
    parse_str(file_get_contents("php://input"), $_POST);
    $this->model->insert($_POST);
    header("Location: " . URL . "Dashboard/render");
  }

  function updateEmployee()
  {
    parse_str(file_get_contents("php://input"), $_POST);
    $this->model->update($_POST);
    header("Location: " . URL . "Dashboard/render");
  }
}