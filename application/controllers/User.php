<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

define("NONE_ERROR", 0);
define("DUPILATE_ERROR", 1);

class User extends SELLDARITY_Controller {
  
  private $UserModel = null;

  public function __construct() {
    parent::__construct();
    
    try {
      $this->UserModel = Model::load("UserModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
  }

  public function ajaxRegister() {
    $rtn = NONE_ERROR;
    $post = $this->input->post();
    $email = $post['email'];
    $password = password_hash($post['password'], PASSWORD_DEFAULT);
    $userName = $post['userName'];

    if(!($this->_checkEmail($email))) {
      $uidx = $this->UserModel->insert($email, $password, $userName, $this->_formattedNow); 
      
      $rtn = array(
        "uidx" => $uidx,
        "name" => $userName,
        "LV" => 0,
        "email" => $email,
      );
      $this->session->set_userdata($rtn);

      $cookie = array(
        'name' => "uidx",
        'value' => $uidx,
        'expire' => '86500',
      );
      $this->input->set_cookie($cookie);
    } else {
      $rtn = DUPILATE_ERROR;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  }

  private function _checkEmail($email) {
    return $this->UserModel->getUserByEmail($email) ? true : false;
  }
}
