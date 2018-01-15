<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

define("NONE_ERROR", 0);
define("DUPILATE_ERROR", 1);
define("NONEXISTENT_ERROR", 2);
define("PASSWORD_ERROR", 3);
define("VERIFICATION_ERROR", 4);

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
      $uidx = $this->UserModel->insert($email, $password, $userName, $verCode, $this->_formattedNow); 
      $rtn = $this->_sendVerificationMail($email, $uidx, $verCode);
    } else {
      $rtn = DUPILATE_ERROR;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  }

  private function _checkEmail($email) {
    return $this->UserModel->getUserByEmail($email) ? true : false;
  }

  private function _sendVerificationMail($email, $uidx, $verCode) {
    $to = $email;
    $subject = "團結拍賣註冊驗證信";
    $message = "進入此網址進行驗證:{$this->_baseUrl}?i={$uidx}&ver={$verCode}";
    return mail($to, $subject, $message);
  }

  public function ajaxSignIn() {
    $rtn = NONE_ERROR;
    $post = $this->input->post();
    $email = $post['email'];
    $password = $post['password'];

    if ($userData =  $this->UserModel->getUserByEmail($email)) {
      if (password_verify($password, $userData['password'])) {
        if ($userData['verification']) {
          $data = array(
            "uidx" => $userData['idx'],
            "name" => $userData['name'],
            "LV" => $userData['LV'],
            "email" => $userData['email'],
          );
          $this->session->set_userdata($data);
        } else {
          $rtn = VERIFICATION_ERROR;
        }
      } else {
        $rtn = PASSWORD_ERROR;
      }
    } else {
      $rtn = NONEXISTENT_ERROR;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  }

  public function signOut() {
    $this->session->sess_destroy();
    header("Location:{$this->_baseUrl}");
    exit;
  }
}
