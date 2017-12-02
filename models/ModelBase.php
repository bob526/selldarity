<?php

class ModelBase {
  private $_table = '';
  private $db = NUll;

  public function __construct($table) {
    global $_db;
    $this->_table = $table;
    $this->db = $_db;
  }
}
