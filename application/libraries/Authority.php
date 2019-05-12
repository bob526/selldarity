<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authority {

  private $_curl = null;
  private $_option = array();

  public function __construct() {
  }

  public function authAPI($api, $params) {
    $rtn = '';
    $info = array();
    $veriAPI = AUTH_URL . $api;

    $this->_curl = curl_init();
    curl_setopt($this->_curl, CURLOPT_URL, $veriAPI);
    curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->_curl, CURLOPT_POST, true);
    curl_setopt($this->_curl, CURLOPT_POSTFIELDS, http_build_query($params));

    $rtn = curl_exec($this->_curl);
    $info = curl_getinfo($this->_curl);

    if ($info['http_code'] != '200') {
      $rtn = '網站發生錯誤，請洽服務人員';
    }

    curl_close($this->_curl);
    return json_decode($rtn, true);
  }
}
