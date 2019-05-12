<?php
include_once __DIR__ . "/PSWModelBase.php";

class FreightModel extends PSWModelBase {
  private $_table = "freight";

  public function __construct() {
    parent::__construct($this->_table);
  }

  public function getAllFreight() {
    $sql = "SELECT `mode`, `fee` FROM `{$this->_table}` ORDER BY `idx` ASC";

    return $this->_runSql($sql)->_getResult('fetchAll');
  }
}
