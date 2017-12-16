<?php

class ModelBase {
  private $_table = '';
  private $_db = null;
  private $_stmt = null;
  private $_errHdr = null;
  private $lastInserId = 0;

  public function __construct($table) {
    global $_db;
    $this->_table = $table;
    $this->_errHdr = new ErrorHdr(ERRCODE_INIT);
    $this->_db = $_db;
  }

  //========
  //PDO
  //========
  protected function fetchColumn($num = 0) {
    $this->_errHdr->setResult($this->_stmt->fetchColumn($num));
    return $this->_errHdr->getResult();
  }

  protected function fetch($style) {
    $this->_errHdr->setResult($this->_stmt->fetch($style));
    return $this->_errHdr->getResult();
  }

  protected function fetchAll($style) {
    $this->_errHdr->setResult($this->_stmt->fetchAll($style));
    return $this->_errHdr->getResult();
  }

  protected function getLastInsertId() {
    return $this->_lastInsertId;
  }

  protected function getColumnList($params) {
    return implode(',', array_keys($params));
  }

  protected function getParamList($params) {
    return implode(',', array_fill(0, count($params), '?'));
  }

  protected function getInputarr($params) {
    return array_values($params);
  }

  protected function getArgPlaceholder($rowCount, $fieldCount) {
    $args = implode(',', array_fill(0, $fieldCount, '?'));
    $row = "({$args})";
    return implode(',', array_fill(0, $rowCount, $row));
  }

  protected function getInsertSql($params, $ignore = false) {
    $sql = '';
    $colList = $this->getColumnList($params);
    $paramList = $this->getParamList($params);

    if (!$ignore) {
      $sql = "INSERT INTO {$this->_table} ({$colList}) VALUES ({$paramList})";
    } else {
      $sql = "INSERT IGNORE INTO {$this->_table} ({$colList}) VALUES ({$paramList})";
    }
    
    return $sql;
  }

  protected function _insert($params, $ignore = false) {
    $sql = $this->getInsertSql($params, $ignore);
    $inputarr = $this->getInputarr($params);

    return $this->runSql($sql, $inputarr);
  }

  protected function runSql($sql, $inputarr = array()){
    $this->_stmt = $this->_db->prepare($sql);
    if ($this->_stmt === false) {
      $this->_setRtn($this->_db->errorInfo());
    } else {
      $this->_stmt->execute($inputarr);
      $this->_lastInsertId = $this->_db->lastInsertId();
      $this->_setRtn($this->_stmt->errorInfo());
    }

    return $this;
  }
  
  //=========
  //PROTOCOL RTN
  //=========

  public function getErrcode() {
    return $this->_errHdr->getErrinfo();
  }

  public function getErrinfo() {
    return $this->_errHdr->getErrinfo();
  }

  public function getErrmsg() {
    return $this->_errHdr->getErrmsg();
  }

  public function getResult() {
    return $this->_errHdr->getResult();
  }

  private function _setRtn($errorInfo) {
    if (!(int)$errorInfo[1]) {
      $errcode = ERRCODE_NONE;
    } else {
      $errcode = ERRCODE_MARIADB;
    }

    $this->_errHdr->setError($errcode, $errorInfo);
  }
}
