<?php

class FreightModel extends ModelBase {
  private $_table = "freight";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getAllFreight() {
    $sql = "SELECT * FROM {$this->_table} ORDER BY idx ASC";

    return $this->runSql($sql)->fetchAll(PDO::FETCH_ASSOC);
  }
}
