<?php

class CommodityModel extends ModelBase {
  private $_table = "commodity";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getAllCommodity() {
    $sql = "SELECT C.*, S.name as sortName FROM {$this->_table} as C, sort as S WHERE C.sortId = S.idx ORDER BY idx ASC";

    return $this->runSql($sql)->fetchAll(PDO::FETCH_ASSOC);
  }
}
