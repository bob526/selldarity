<?php

class ModelBase extends CI_Model {
  private $_db = null;
  private $_table = '';

  private $_result = null;
  private $_errCode = 0;
  private $_errInfo = '';

  public function __construct($thisDB, $thisTable) {
    parent::__construct();
    $this->_db = $thisDB;
    $this->_table = $thisTable;
  }

  protected function _getLastInsertId() {
    return $this->_db->insert_id();
  }

  protected function _getColumnList($params) {
    return implode(',', array_keys($params));
  }

  protected function _getParamList($params) {
    return implode(',', array_fill(0, count($params), '?'));
  }

  protected function _getInputarr($params) {
    return array_values($params);
  }

  protected function _getPlaceholder($fieldCount) {
    $args = implode(',', array_fill(0, $fieldCount, '?'));
    return "({$args})";
  }

  protected function _getArgPlaceholder($rowCount, $fieldCount) {
    return implode(',', array_fill(0, $rowCount, $this->_getPlaceholder($fieldCount)));
  }

  protected function _insert($insertInput) {
    $inputRtn = true;

    $inputRtn = is_array(array_pop($insertInput)) ?
    $this->_db->insert_batch($this->_table, $insertInput) :
    $this->_db->insert($this->_table, $insertInput);

    $this->_result = $inputRtn ? null : $this->_setRtn($this->_db->error());

    return $this;
  }

  protected function _runSql($sql, $inputarr = array()) {
    if ($query = $this->_db->query($sql, $inputarr)) {
      $this->_result = $query;
    } else {
      $this->_result = $this->_setRtn($this->_db->errorInfo());
    }

    return $this;
  }

  protected function _getResult($mode = 'origin') {
    $rtn = $this->_result;

    if ($rtn !== 'ERROR') {
      switch ($mode) {
        case 'origin':
        $rtn = $this->_result;
        break;
        case 'fetchAll':
        $rtn = $this->_result->result_array();
        break;
        case 'fetch':
        $rtn = $this->_result->row_array();
        break;
        case 'getOne':
        $temp = $this->_result->row_array();
        $rtn = $temp ? array_pop($temp) : '';
        break;
        default:
        $rtn = $this->_result;
        break;
      }
    }

    return $rtn;
  }

  public function _getErrcode() {
    return $this->_errCode;
  }

  public function _getErrinfo() {
    return $this->_errInfo;
  }

  private function _setRtn($error) {
    if (!$error) {
      $this->_errCode = $error['code'];
      $this->_errInfo = $error['message'];
    }

    return 'ERROR';
  }
}
