<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class ErrorPage extends SELLDARITY_Controller {
  
  public function __construct() {
    parent::__construct();
  }

  public function error() {
    $errorMsg = $this->input->get('msg');
    
    if (!$errorMsg) $errorMsg = "網頁錯誤";

    $data = array(
      "errorMsg" => $errorMsg,
    );
    $this->load->view('error/errorPage', $data);
  }
}
