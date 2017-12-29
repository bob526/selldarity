<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

define("NONE_ERROR", 0);

class Home extends SELLDARITY_Controller {
  
  private $CommodityModel = null;

  public function __construct() {
    parent::__construct();
    
    try {
      $this->CommodityModel = Model::load("CommodityModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
  }

  public function mainPage() {
    $data = array();
    $verData = $this->input->get();
    if ($verData) {
      try {
        $UserModel = Model::load("UserModel");
      } catch(Exception $e) {
        print_r(json_decode($e->getMessage()));
        exit;
      }

      $userData = $UserModel->getUserDataByIdx($verData['i']);
      if ($userData['verCode'] == $verData['ver']) {
        $rtn = $UserModel->verifyUser($userData['idx'], $this->_formattedNow);
        if (!$rtn) {
          $sessionData = array(
            "uidx" => $userData['idx'],
            "name" => $userData['name'],
            "LV" => $userData['LV'],
            "email" => $userData['email'],
          );
          $this->session->set_userdata($sessionData);
          $this->_uidx = $userData['idx'];
          $registeredInfo = $this->load->view('mainPage/registeredInfo', $data, true);
        } else {
          header("Location:{$this->_errorPage}Update verification error");
          exit;
        }
      } else {
        header("Location:{$this->_errorPage}Haven't verified");
        exit;
      }
    } 

    $allCommodity = $this->CommodityModel->getAllCommodity();
    $data = $this->_getLayoutData();
    $data["allCommodity"] = $this->_resortCommodityData($allCommodity = $this->CommodityModel->getAllCommodity());
    if (isset($registeredInfo)) {
      $data["registeredInfo"] = $registeredInfo;
    }
    
    $this->load->view('mainPage/home', $data);
  }

  private function _resortCommodityData($allData) {
    $rtn = array();
    foreach($allData as $data) {
      if(isset($rtn[$data["sortName"]])) $rtn[$data["sortName"]] = array();
      $rtn[$data["sortName"]][] = $data;
    }

    return $rtn;
  }
}
