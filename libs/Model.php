<?php

class Model
{
  function __construct()
  {
    echo "new Model";
    $this->db = new Database();
  }
}