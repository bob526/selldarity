<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Commodity extends SELLDARITY_Controller {
  
  private $mainModel = null;

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
    $allCommodity = $this->CommodityModel->getAllCommodity();
    $data = $this->_getLayoutData();
    $data["allCommodity"] = $this->_resortCommodityData($allCommodity = $this->CommodityModel->getAllCommodity());
    
    $this->load->view('mainPage/home', $data);
  }

  public function test() {
    print_r("okok");
    exit;
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
