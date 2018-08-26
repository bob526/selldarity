<?php

class UserProductModel extends ModelBase {
  private $_table = "user_product";
  private $_calToShipPercentAndOffPrice = "ROUND(100*((P.ship_Num - P.to_Ship)/P.ship_Num), 0) toShipPercent, ROUND(P.ori_Price*((100-P.off_Percent)/100)) off_Price";

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

  public function getProductsByUidx($uidx) {
    $uidx = 1;
    $rtn = array();
    $sql = "SELECT UP.idx as storeProductId, UP.product_id, UP.type, UP.number, P.*, {$this->_calToShipPercentAndOffPrice} FROM {$this->_table} UP, product P WHERE
      UP.product_id = P.idx AND
      P.idx IN (
        SELECT product_id FROM {$this->_table} WHERE user_id = ?
      )";
    $inputarr = array($uidx);
    $products = $this->runSql($sql, $inputarr)->fetchAll(PDO::FETCH_ASSOC);

    return $products;
  }
}
