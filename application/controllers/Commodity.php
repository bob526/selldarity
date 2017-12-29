<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Commodity extends SELLDARITY_Controller {
  
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
}
