<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

define("NONE_ERROR", 0);

class Home extends SELLDARITY_Controller {
  
  private $ProuctModel = null;

  public function __construct() {
    parent::__construct();
    
    try {
      $this->ProductModel = Model::load("ProductModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
  }

  public function mainPage() {
    $data = array();
    try {
      $DepartmentsModel = Model::load("DepartmentsModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }

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
          $registeredInfo = $this->load->view('mainPage/registeredInfo', array('baseUrl' => $this->_baseUrl), true);
        } else {
          header("Location:{$this->_errorPage}Update verification error");
          exit;
        }
      } else {
        header("Location:{$this->_errorPage}Haven't verified");
        exit;
      }
    } 

    if (isset($registeredInfo)) {
      $data["registeredInfo"] = $registeredInfo;
    }

    $data = $this->_getLayoutData($data);
    $data["allDepartments"] = $this->_resetDepartments($DepartmentsModel->getAllDepartments());
    $data["popularProduct"] = $this->_resortProductData($popularProduct = $this->ProductModel->getPopularProduct(), $data["allDepartments"]['departments']);


    $this->load->view('mainPage/home', $data);
  }

  private function _resetDepartments($departments) {
    $rtn = array("selectedItem" => array(), "departments" => array());

    foreach ($departments as $data) {
      if ($data['name'] == "熱門") {
        $rtn['selectedItem'] = $data;
      } else {
        $rtn['departments'][] = $data;
      }
    }

    return $rtn;
  }

  private function _resortProductData($allData, $departments) {
    $rtn = array();

    foreach ($departments as $dep) {
      foreach ($allData as $data) {
        if ($data['dep_Id'] == $dep['idx']) {
          if (!isset($rtn[$dep['name']])) {
              $rtn[$dep['name']] = array();
          }
          $data['toShipPercent'] = floor(100*(($data['ship_Num'] - $data['to_Ship'])/$data['ship_Num']));
          
          $rtn[$dep['name']][] = $data;
        }
      }
    }

    return $rtn;
  }

  public function ajaxGetRegisterWindow() {
    $rtn = $this->load->view('mainPage/registerWindow', array("baseUrl" => $this->_baseUrl), true);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  } 

  public function ajaxGetSignInWindow() {
    $rtn = $this->load->view('mainPage/signInWindow', array("baseUrl" => $this->_baseUrl), true);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  } 

  public function ajaxGetProductInfo() {
    try {
      $FreightModel = Model::load("FreightModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
    $pid = $this->input->post("Pidx");
    $data = array();
    $data["baseUrl"] = $this->_baseUrl;
    $data["product"] = $this->ProductModel->getProductById($pid);
    $data["product"]['toShipPercent'] = floor(100*(($data["product"]['ship_Num'] - $data["product"]['to_Ship'])/$data["product"]['ship_Num']));
    $data['freight'] = $FreightModel->getAllFreight();
    $rtn = $this->load->view('mainPage/productDetailInfo', $data, true);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  }

  public function ajaxGetDropProduct() {
    try {
      $UserProductModel = Model::load("UserProductModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
    $pid = $this->input->post("Pidx");
    $uid = $this->input->post("Uidx");
    $data = array();
    $data["baseUrl"] = $this->_baseUrl;
    $data["product"] = $this->ProductModel->getProductById($pid);
    $data["warehouseProduct"] = $UserProductModel->getWarehouseProductByUidAndPid($uid, $pid);
    $rtn = $this->load->view('mainPage/dropItem', $data, true);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn);
  }
}