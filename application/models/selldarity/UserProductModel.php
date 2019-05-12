<?php
include_once __DIR__ . "/SelldarityModelBase.php";

class UserProductModel extends SelldarityModelBase {
  private $_table = "user_product";

  public function __construct() {
    parent::__construct($this->_table);
  }

  public function insert($distinct_id, $pid, $category_id, $now) {
    $inputarr = array(
      "distinct_id" => $distinct_id,
      "product_id" => $pid,
      "category_id" => $category_id,
      "create_time" => $now,
      "update_time" => $now,
    );

    return $this->_insert($inputarr)->_getLastInsertId();
  }

  public function deleteStoreProductByIdx($idx) {
    $sql = "DELETE FROM `{$this->_table}` WHERE `idx` = ?";
    $inputarr = array($idx);
    return $this->_runSql($sql, $inputarr);
  }

  public function getUserProductsByDistictId($distinct_id) {
    $sql = "SELECT CA.category, UP.idx  as `storeProductId`, UP.category_id, UP.number, UP.product_id
            FROM `category` CA LEFT OUTER JOIN `{$this->_table}` UP
            ON CA.idx = UP.category_id
            WHERE UP.distinct_id = ?";
    $inputarr = array($distinct_id);
    return $this->_runSql($sql, $inputarr)->_getResult('fetchAll');
  }

  public function batchUpdateNumById($storeProductNum, $storeProductId, $now) {
    $placeholder = $this->_getPlaceholder(count($storeProductId));
    $sql = "UPDATE `{$this->_table}` SET `number` = CASE";
    $updateTimeSql = " `update_time` = CASE";
    $inputarr = array();
    $updateTimeArr = array();
    foreach ($storeProductNum as $key => $num) {
      $sql .= " WHEN `idx` = ? THEN ?";
      $inputarr[] = $storeProductId[$key];
      $inputarr[] = $num;
      $updateTimeSql .= " WHEN `idx` = ? THEN ?";
      $updateTimeArr[] = $storeProductId[$key];
      $updateTimeArr[] = $now;
    }
    $sql .= " ELSE `number` END," . $updateTimeSql . " ELSE `update_time` END WHERE `idx` IN {$placeholder}";
    $inputarr = array_merge($inputarr, array_merge($updateTimeArr, $storeProductId));
    return $this->_runSql($sql, $inputarr)->_getResult('origin');
  }

  public function updateDistictIdToUserId($distinct_id, $user_id, $now) {
    $sql = "UPDATE {$this->_table} SET distinct_id = ?, update_time = ? WHERE distinct_id = ?";
    $inputarr = array(
      $user_id,
      $now,
      $distinct_id,
    );

    return $this->_runSql($sql, $inputarr)->_getResult('origin');
  }

  public function getUserProductsByDistictIdAndCategory($distinct_id, $category_id) {
    $sql = "SELECT UP.idx  as `storeProductId`, UP.category_id, UP.number, UP.product_id
            FROM `category` CA LEFT OUTER JOIN `{$this->_table}` UP
            ON CA.idx = UP.category_id
            WHERE UP.distinct_id = ? AND UP.category_id = ?";
    $inputarr = array($distinct_id, $category_id);
    return $this->_runSql($sql, $inputarr)->_getResult('fetchAll');
  }
}
