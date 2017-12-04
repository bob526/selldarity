<?php

class CommodityModel extends ModelBase {
  private $_table = "commodity";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getAllCommodity() {
    global $_db;
    $sql = "SELECT C.*, S.name as sortName FROM {$this->_table} as C, sort as S WHERE C.sortId = S.idx ORDER BY idx ASC";
    $inputarr = array();
    $dbh = $_db->prepare($sql);
    $dbh->execute($inputarr);

    return $dbh->fetchAll(PDO::FETCH_ASSOC);
  }
}
