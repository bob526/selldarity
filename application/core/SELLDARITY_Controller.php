<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class SELLDARITY_Controller extends CI_Controller {
    protected $_now = 0;
    protected $_formattedNow = '';
    protected $_baseUrl = '';
    protected $errorPage = '';
    
    public function __construct() {
      parent::__construct();
      include_once "models/inc.php";

      $this->_now = $this->input->server('REQUESR_TIME');
      $this->_formattedNow = date('Y-m-d H:i:s', $this->_now);
      $this->_baseUrl = "http://".base_url();
      
    }
}
