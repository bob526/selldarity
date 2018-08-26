<?php

class ProductModel extends ModelBase {
  private $_table = "product";
  private $_calToShipPercentAndOffPrice = "ROUND(100*((P.ship_Num - P.to_Ship)/P.ship_Num), 0) toShipPercent, ROUND(P.ori_Price*((100-P.off_Percent)/100)) off_Price";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getPopularProduct() {
    $sql = "SELECT *, {$this->_calToShipPercentAndOffPrice} FROM {$this->_table} P WHERE popular=1 ORDER BY idx ASC";

    return $this->runSql($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductById($productId) {
    $sql = "SELECT *, {$this->_calToShipPercentAndOffPrice} FROM {$this->_table} P WHERE idx=?";
    $inputarr = array($productId);
    return $this->runSql($sql, $inputarr)->fetch(PDO::FETCH_ASSOC);
  }

  public function getProductsByDepartment($productDepartment) {
    $sql = "SELECT *, {$this->_calToShipPercentAndOffPrice} FROM {$this->_table} P WHERE dep_Id=?";
    $inputarr = array($productDepartment);
    return $this->runSql($sql, $inputarr)->fetchAll(PDO::FETCH_ASSOC);
  }
}
