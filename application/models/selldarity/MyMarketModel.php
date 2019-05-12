<?php
include_once __DIR__ . "/SelldarityModelBase.php";

class MyMarketModel extends SelldarityModelBase {
  private $_table = "myMarket";

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
}
