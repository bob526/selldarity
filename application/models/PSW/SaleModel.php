<?php
include_once __DIR__ . "/PSWModelBase.php";

class SaleModel extends PSWModelBase {
  private $_table = "sale";

  public function __construct() {
    parent::__construct($this->_table);
  }

  public function getProdutsSaleNumByProductsId($productsId) {
    $placeholder = $this->_getPlaceholder(count($productsId));
    $sql = "SELECT `product_id`, SUM(`number`) AS total
            FROM {$this->_table}
            WHERE `product_id` IN {$placeholder}
            GROUP BY `product_id`";
    $inputarr = $productsId;
    return $this->_runSql($sql, $inputarr)->_getResult('fetchAll');
  }
}
