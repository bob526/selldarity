<?php
class ErrorHdr {
  private $_errcode = ERRCODE_INIT;
  private $_errrmsg = '';
  private $_errinfo = array();
  private $_result = array();

  public function __construct($errcode = ERRCODE_INIT, $errinfo = array()) {
    $this->setError($errcode, $errinfo);
  }

  public function setError($errcode, $errinfo = array()) {
    $msgs = array(
      ERRCODE_NONE => 'ack',
      ERRCODE_INIT => 'init',
      ERRCODE_UNDEF => 'Error undefined.',
      ERRCODE_DBCONFIG => 'dbcondig.',
      ERRCODE_INVALID_CLASS => 'invalid class',
      ERRCODE_INVALID_PARAM => 'invalid parameters',
    );

    if (isset($msgs[$errcode])) {
      $this->_errcode = $errcode;
      $this->_errmsg = $msgs[$errcode];
      if (!is_array($errinfo)) {
        $errinfo = array($errinfo);
      }
      $this->_errinfo = array_merge($this->_errinfo, $errinfo);
    } else {
      $this->_errcode = ERRCODE_UNDEF;
      $this->_errmsg = $msgs[ERRCODE_UNDEF];
      $this->_errinfo = array();
    }
    
    return $this;
  }

  public function setResult($result) {
    $this->_result = $result;
  }

  public function get($json = false) {
    $rtn = array(
      'errcode' => $this->_errcode,
      'errmsg' => $this->_errmsg,
      'errinfo' => $this->_errinfo,
      'result' => $this->_result,
    );

    return (!(bool)$json) ? $rtn : json_encode($rtn);
  }

  public function getErrcode() {
    return $this->_errcode;
  }

  public function getErrmsg() {
    return $this->_errmsg;
  }

  public function getErrinfo() {
    return $this->_errinfo;
  }

  public function getResult() {
    return $this->_result;
  }

  public function output($json = true, $exit = false) {
    if ($json) {
      header('Content-Type: application/json; charset=utf-8');

      if ($exit) {
        exit($this->get($json));
      } else {
        echo $this->get($json);
      }
    }
  }
}
