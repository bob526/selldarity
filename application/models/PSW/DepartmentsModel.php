<?php
include_once __DIR__ . "/PSWModelBase.php";

class DepartmentsModel extends PSWModelBase {
  private $_table = "department";

  public function __construct() {
    parent::__construct($this->_table);
  }

  public function getAllDepartments() {
    $sql = "SELECT `idx`, `type` FROM `{$this->_table}` ORDER BY `idx` ASC";

    return $this->_runSql($sql)->_getResult('fetchAll');
  }
}
