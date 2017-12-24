<?php

class UserModel extends ModelBase {
  private $_table = "user";

  public function __construct() {
    parent::__construct($this->_table);
  }
  
  public function getUserByEmail($email) {
    $sql = "SELECT name FROM {$this->_table} WHERE email = ?";
    $inputarr = array($email);
    return $this->runSql($sql, $inputarr)->fetch(PDO::FETCH_ASSOC);
  }

  public function insert($email, $password, $userName, $now) {
    $inputarr = array(
      "email" => $email,
      "password" => $password,
      "name" => $userName,
      "create_time" => $now,
      "update_time" => $now,
    );

    return $this->_insert($inputarr)->getLastInsertId();
  }
}
