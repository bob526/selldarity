<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define("NONE_ERROR", 0);
define("DUPILATE_ERROR", 1);
define("NONEXISTENT_ERROR", 2);
define("PASSWORD_ERROR", 3);
define("VERIFICATION_ERROR", 4);

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

  public function ajaxLogin() {
    try {
      $UserModel = Model::load("UserModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
    $rtn = NONE_ERROR;

    if ($userData =  $UserModel->getUserByEmail($this->input->post('email'))) {
      if (password_verify($this->input->post('password'), $userData['password'])) {
        if ($userData['verification']) {
          $this->session->set_userdata('user', array(
            "uid" => $userData['idx'],
            "name" => $userData['name'],
            "LV" => $userData['LV'],
            "email" => $userData['email'],
            "picture" => $userData['picture_url'],
          ));
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

  public function ajaxRegister() {
    try {
      $UserModel = Model::load("UserModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
    $rtn = NONE_ERROR;
    $email = $this->input->post('email');
    $userName = $this->input->post('userName');
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

    if(!($this->_checkEmail($email, $UserModel))) {
      $verCode = md5($this->_formattedNow);
      $uidx = $UserModel->insert($email, $password, $userName, $verCode, $this->_formattedNow); 
      //The function will work when the environment get ready.
      //$rtn = $this->_sendVerificationMail($email, $uidx, $verCode);
    } else {
      $rtn = DUPILATE_ERROR;
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  }

  private function _checkEmail($email, $UserModel) {
    return $UserModel->getUserByEmail($email) ? true : false;
  }

  private function _sendVerificationMail($email, $uidx, $verCode) {
    $to = $email;
    $subject = "團結拍賣註冊驗證信";
    $message = "進入此網址進行驗證:{$this->_baseUrl}?i={$uidx}&ver={$verCode}";
    return mail($to, $subject, $message);
  }

  public function logout() {
    $this->session->unset_userdata('user');
    header("Location:{$this->_baseUrl}");
    exit;
  }

  protected function _verificationCheck($idx = "", $ver = "") {
    $rtn = false;

    if ($idx && $ver) {
      try {
        $UserModel = Model::load("UserModel");
      } catch(Exception $e) {
        print_r(json_decode($e->getMessage()));
        exit;
      }

      $userData = $UserModel->getUserDataByIdx($idx);
      if ($userData['verCode'] == $ver) {
        $rtn = $UserModel->verifyUser($userData['idx'], $this->_formattedNow);
        if (!$rtn) {
          $sessionData = array(
            "uidx" => $userData['idx'],
            "name" => $userData['name'],
            "LV" => $userData['LV'],
            "email" => $userData['email'],
          );
          $this->session->set_userdata('user', $sessionData);
          $this->_uidx = $userData['idx'];
          $rtn = $this->load->view('mainPage/registeredInfo', array('baseUrl' => $this->_baseUrl), true);
        } else {
          header("Location:{$this->_errorPage}Update verification error");
          exit;
        }
      } else {
        header("Location:{$this->_errorPage}Haven't verified");
        exit;
      }
    } 

    return $rtn;
  }

  protected function is_login() {
    return $this->session->userdata('user') ? true : false;
  }
}
