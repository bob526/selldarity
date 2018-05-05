<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class SELLDARITY_Controller extends CI_Controller {
    protected $_now = 0;
    protected $_formattedNow = '';
    protected $_baseUrl = '';
    protected $_errorPage = '';
    protected $_uidx = '';
    
    public function __construct() {
      parent::__construct();
      include_once "models/inc.php";
      $this->load->helper('url');
      $this->load->library('session');

      $this->_now = $this->input->server('REQUEST_TIME');
      $this->_formattedNow = date('Y-m-d H:i:s', $this->_now);
      $this->_baseUrl = "http://".base_url();
      $this->_uidx = $this->session->userdata('uidx');
      $this->_errorPage = "{$this->_baseUrl}error/errorPage?msg=";
    }

    protected function _getLayoutData($data = array()) {
      $data['baseUrl'] = $this->_baseUrl;
      $data['uidx'] = $this->_uidx;
      $data['userName'] = $this->session->userdata('name');
      $data['LV'] = $this->session->userdata('LV');
      $data['layouthead'] = $this->load->view('layout/layouthead', $data, true);
      $data['layoutbody'] = $this->load->view('layout/layoutbody', $data, true);
      return $data;
    }

    protected function _whetherSignIn() {
      if (!($this->_uidx)) {
        header("Location:{$this->_baseUrl}");
        exit;
      } 

      return true;
    }
}
