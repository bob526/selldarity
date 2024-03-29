<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . "/Authority.php";

define("USER_ACCOUNT", 1);
define("SALE_RECORD", 2);
define("TRANSACTION", 3);
define("PERSONAL_MARKET", 4);
define("WAREHOUSE", 5);
define("NOTICE_OVERVIEW", 6);
define("WALLET_INFO", 7);

class User extends SELLDARITY_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function userInfo($userInfoType) {
    $data = array();
    $data = $this->_getLayoutData($data);

    switch ($userInfoType) {
      case USER_ACCOUNT :
      $data['email'] = $this->_userInfo['email'];
      $data['phone'] = $this->_userInfo['phone'];
      $data['marketName'] = $this->_userInfo['marketName'];
      $data['gender'] = $this->_userInfo['gender'];
      $data['birthday'] = $this->_userInfo['birthday'];
      $data['userInfoType'] = $this->load->view('user/userInfo_account', $data, true);
      break;
      case SALE_RECORD :
      break;
      case TRANSACTION :
      $data['userInfoType'] = $this->load->view('user/userInfo_transaction', $data, true);
      break;
      case PERSONAL_MARKET :
      $data['userInfoType'] = $this->load->view('user/userInfo_personal_market', $data, true);
      break;
      case WAREHOUSE :
      break;
      case NOTICE_OVERVIEW :
      break;
      case WALLET_INFO :
      break;
    }

    $this->load->view('user/userInfo', $data);
  }
}
