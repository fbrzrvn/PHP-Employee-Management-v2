<?php

class User extends Controller
{
  function __construct()
  {
    parent::__construct();
    require HELPERS . 'session.php';
    validateSession();
  }

  function render()
  {
    $this->view->render('User/index');
  }

  function renderUser($id)
  {
    $result = $this->model->getUser($id);
    $this->view->result = $result;
    $this->view->render('User/userModel');
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
        $this->model->remove(intval($_DELETE['user_id']));
        break;

      case "POST":
        parse_str(file_get_contents("php://input"), $_POST);
        $this->model->insert($_POST);
        break;

      default:
        break;
    }
  }
}