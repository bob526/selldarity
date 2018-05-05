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

  public function ajaxGetProductInfo() {
    $productData = $this->ProductModel->getProductById($this->input->post('idx'));
    
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($productData);
  }
}
