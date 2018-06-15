<?php

class ProductModel extends ModelBase {
  private $_table = "product";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getPopularProduct() {
    $sql = "SELECT * FROM {$this->_table} WHERE popular=1 ORDER BY idx ASC";

    return $this->runSql($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductById($productId) {
    $sql = "SELECT * FROM {$this->_table} WHERE idx=?";
    $inputarr = array($productId);
    return $this->runSql($sql, $inputarr)->fetch(PDO::FETCH_ASSOC);
  }

  public function getProductsByDepartment($productDepartment) {
    $sql = "SELECT * FROM {$this->_table} WHERE dep_Id=?";
    $inputarr = array($productDepartment);
    return $this->runSql($sql, $inputarr)->fetchAll(PDO::FETCH_ASSOC);
  }
}
