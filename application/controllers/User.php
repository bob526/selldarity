<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

define("NONE_ERROR", 0);
define("DUPILATE_ERROR", 1);
define("NONEXISTENT_ERROR", 2);
define("PASSWORD_ERROR", 3);

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
      $verCode = md5($this->_formattedNow);
      //$uidx = $this->UserModel->insert($email, $password, $userName, $verCode, $this->_formattedNow); 

      $uidx = 0;
      $rtn = array(
        "uidx" => $uidx,
        "name" => $userName,
        "LV" => 0,
        "email" => $email,
      );
      $this->session->set_userdata($rtn);
      $mailRtn = $this->_sendVerificationMail($email, $uidx, $verCode);
    } else {
      $rtn = DUPILATE_ERROR;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($mailRtn);
  }

  private function _checkEmail($email) {
    return $this->UserModel->getUserByEmail($email) ? true : false;
  }

  private function _sendVerificationMail($email, $uidx, $verCode) {
    $to = $email;
    $subject = "團結拍賣註冊驗證信";
    $message = "{$this->_baseUrl}?i={$uidx}&ver={$verCode}";
    return mail($to, $subject, $message);
  }

  public function ajaxSignIn() {
    $rtn = NONE_ERROR;
    $post = $this->input->post();
    $email = $post['email'];
    $password = $post['password'];

    if ($userData =  $this->UserModel->getUserByEmail($email)) {
      if (password_verify($password, $userData['password'])) {
        $this->load->library('session');
        $data = array(
          "uidx" => $userData['idx'],
          "name" => $userData['name'],
          "LV" => $userData['LV'],
          "email" => $userData['email'],
        );
        $this->session->set_userdata($data);
      } else {
        $rtn = PASSWORD_ERROR;
      }
    } else {
      $rtn = NONEXISTENT_ERROR;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  }
}
