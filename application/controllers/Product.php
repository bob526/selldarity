<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends SELLDARITY_Controller {
  
  private $ProductModel = null;

  public function __construct() {
    parent::__construct();
    
    try {
      $this->ProductModel = Model::load("ProductModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
  }

  public function personalProductsManage() {
    try {
      $UserProductModel = Model::load("UserProductModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
    $data = array();
    
    $data = $this->_getLayoutData($data);
    $dropItems = $this->resetDropItem($UserProductModel->getProductsByUidx($data['uidx']));
    $data['shoppingCar'] = $dropItems['shoppingCar'];
    $data['warehouse'] = $dropItems['warehouse'];
    $data['personal'] = $dropItems['personal'];
    $this->load->view('product/personalProductsManage', $data);
  }

  private function resetDropItem($allData) {
    $rtn = array(
      "shoppingCar" => array(),
      "warehouse" => array(),
      "persnoal" => array(),
    );

  }

  public function ajaxGetProductInfo() {
    $productData = $this->ProductModel->getProductById($this->input->post('idx'));
    
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($productData);
  }

  public function ajaxDeleteStoreProduct() {
    try {
      $UserProductModel = Model::load("UserProductModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }

    $idx = $this->input->post('idx');
    $UserProductModel->deleteStoreProductByIdx($idx);
    reture;
  }
}
