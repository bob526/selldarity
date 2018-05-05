<?php

class DepartmentsModel extends ModelBase {
  private $_table = "departments";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getAllDepartments() {
    $sql = "SELECT * FROM {$this->_table} ORDER BY idx ASC";

    return $this->runSql($sql)->fetchAll(PDO::FETCH_ASSOC);
  }
}
