<?php

class VerificationModel extends ModelBase {
  private $_table = "verification";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function insert($userId, $verCode, $now) {
    $inputarr = array(
      "userId" => $userId,
      "verCode" => $verCode,
      "create_time" => $now,
      "update_time" => $now,
    );

    return $this->_insert($inputarr)->getLastInsertId();
  }

  public function getByUserId($userId) {
    $sql = "SELECT userId, verCode FROM {$this->_table} WHERE userId=?";
    $inputarr = array($userId);
    return $this->runSql($sql, $inputarr)->fetch(PDO::FETCH_ASSOC);
  }

  public function deleteByUserId($uid) {
    $sql = "DELETE FROM {$this->_table} WHERE userId=?";
    $inputarr = array($uid);
    return $this->runSql($sql, $inputarr)->getErrcode();
  }
}
