<?php

class UserProductModel extends ModelBase {
  private $_table = "user_product";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getWarehouseProductByUidAndPid($uid, $pid) {
    $sql = "SELECT * FROM {$this->_table} WHERE user_id=? AND product_id=? AND type=2";
    $inputarr = array($uid, $pid);
    return $this->runSql($sql, $inputarr)->fetch(PDO::FETCH_ASSOC);
  }
}
