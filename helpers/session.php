<?php

function validateSession(){
  session_start();
  if(!isset($_SESSION['user_id']) || (time() - $_SESSION['loginTime'] > $_SESSION['timer'])){
    header("Location: " . URL . "Login");
  }
}