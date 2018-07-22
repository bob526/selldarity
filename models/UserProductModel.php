<?php

class UserProductModel extends ModelBase {
  private $_table = "user_product";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function insert($uid, $pid, $type, $now) {
    $inputarr = array(
      "user_id" => $uid,
      "product_id" => $pid,
      "type" => $type,
      "create_time" => $now,
      "update_time" => $now,
    );

    return $this->_insert($inputarr)->getLastInsertId();
  }

  public function getStoreProductByUidPidType($uid, $pid, $type) {
    $sql = "SELECT * FROM {$this->_table} WHERE user_id=? AND product_id=? AND type=?";
    $inputarr = array($uid, $pid, $type);
    return $this->runSql($sql, $inputarr)->fetch(PDO::FETCH_ASSOC);
  }

  public function deleteStoreProductByIdx($idx) {
    $sql = "DELETE FROM {$this->_table} WHERE idx=?";
    $inputarr = array($idx);
    return $this->runSql($sql, $inputarr)->getErrcode();
  }
}
