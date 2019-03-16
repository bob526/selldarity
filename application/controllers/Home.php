<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . "/Authority.php";

class Home extends Authority {

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
    try {
      $DepartmentsModel = Model::load("DepartmentsModel");
      $UserProductModel = Model::load("UserProductModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
    
    $data = array();
    $productDepartment = $this->input->get('dep') ? $this->input->get('dep'): 1;
    $data["registeredInfo"] = $this->_verificationCheck($idx = $this->input->get('i'), $ver = $this->input->get('ver'));

    $data = $this->_getLayoutData($data);
    $data["allDepartments"] = $this->_resetDepartments($DepartmentsModel->getAllDepartments(), $productDepartment);

    $data["products"] = ($productDepartment == 1) ? $this->ProductModel->getPopularProduct() : $this->ProductModel->getProductsByDepartment($productDepartment);

    $dropItems = $this->_resetDropItem($UserProductModel->getProductsByUidx($data['uidx']));
    $data['shoppingCar'] = $dropItems['shoppingCar'];
    $data['warehouse'] = $dropItems['warehouse'];
    $data['personal'] = $dropItems['personal'];

    $this->load->view('mainPage/home', $data);
  }

  private function _resetDepartments($departments, $productDepartment) {
    $rtn = array("selectedItem" => array(), "departments" => array());

    foreach ($departments as $data) {
      if ($data['idx'] == $productDepartment) {
        $rtn['selectedItem'] = $data;
      } else {
        $rtn['departments'][] = $data;
      }
    }

    return $rtn;
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
    $data["product"] = $this->ProductModel->getProductById($pid);
    $data["product"]['toShipPercent'] = floor(100*(($data["product"]['ship_Num'] - $data["product"]['to_Ship'])/$data["product"]['ship_Num']));
    $data["product"]['off_Price'] = floor($data["product"]['ori_Price']*((100-$data["product"]['off_Percent'])/100));
    $data ['freight'] = $FreightModel->getAllFreight();

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
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
    $type = $this->input->post("type");

    $data = array();
    $data["product"] = $this->ProductModel->getProductById($pid);
    $data["product"]['off_Price'] = floor($data["product"]['ori_Price']*((100-$data["product"]['off_Percent'])/100));

    if ($storeProduct = $UserProductModel->getStoreProductByUidPidType($uid, $pid, $type)) {
      $data['numOfStoreProduct'] = $storeProduct['number'];
      $data['storeProductId'] = $storeProduct['idx'];
    } else {
      $data['numOfStoreProduct'] = 0;
      $data["storeProductId"] = $UserProductModel->insert($uid, $pid, $type, $this->_formattedNow);
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
  }
}
