<?php
include_once __DIR__ . "/SelldarityModelBase.php";

class WalletModel extends SelldarityModelBase {
  private $_table = "wallet";

  public function __construct() {
    parent::__construct($this->_table);
  }

  public function insert($user_id, $now) {
    $inputarr = array(
      "user_id" => $user_id,
      "create_time" => $now,
      "update_time" => $now,
    );

    return $this->_insert($inputarr)->_getLastInsertId();
  }

  public function getDepositByUserId($user_id) {
    $sql = "SELECT `deposit` FROM `{$this->_table}` WHERE `user_id` = ?";
    $inputarr = [$user_id];
    return $this->_runSql($sql, $inputarr)->_getResult('getOne');
  }
}
