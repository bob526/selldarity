<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define("NONE_ERROR", 0);
define("DUPILATE_ERROR", 1);
define("CREATE_USER_ERROR", 2);
define("SEND_MAIL_ERROR", 3);
define("NONEXISTENT_ERROR", 4);
define("PASSWORD_ERROR", 5);
define("VERIFICATION_ERROR", 6);

class Authority extends SELLDARITY_Controller {

  public function __construct() {
    parent::__construct();
  }

  protected function auth() {
    if (!$this->session->userdata('user')) {
      $this->authPage();
    }
  }

  protected function authPage() {
    $this->session->unset_userdata('user');
    header("Location: ".$this->_baseUrl);
    exit;
  }

  public function logout() {
    $this->session->unset_userdata('user');
    header("Location:{$this->_baseUrl}");
    exit;
  }

  protected function is_login() {
    return $this->session->userdata('user') ? true : false;
  }
}
