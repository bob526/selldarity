<?php
include_once __DIR__ . "/PSWModelBase.php";

class ProductModel extends PSWModelBase {
  private $_table = "product";

  public function __construct() {
    parent::__construct($this->_table);
  }

  public function getProductByIds($productsId) {
    $placeholder = $this->_getPlaceholder(count($productsId));
    $sql = "SELECT * FROM `{$this->_table}` WHERE `idx` IN {$placeholder}";
    $inputarr = $productsId;
    return $this->_runSql($sql, $inputarr)->_getResult('fetchAll');
  }

  public function getProductsByDepartment($productDepartment, $limit = 20) {
    $sql = "SELECT p.*
            FROM {$this->_table} p JOIN productDepartment pd
            ON p.idx = pd.product_id
            WHERE `department_id` = ?
            LIMIT ?";
    $inputarr = array(
      $productDepartment,
      $limit
    );
    return $this->_runSql($sql, $inputarr)->_getResult('fetchAll');
  }
}
