<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends SELLDARITY_Controller {
  
  private $mainModel = null;

  public function __construct() {
    parent::__construct();
    
    try {
      $this->MainModel = Model::load("MainModel");
    } catch(Exception $e) {
      print_r(json_decode($e->getMessage()));
      exit;
    }
  }

  public function mainPage() {
    print_r("okok");
    exit;
  }
}
