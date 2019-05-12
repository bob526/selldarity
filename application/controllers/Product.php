<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends SELLDARITY_Controller {
  public function __construct() {
    parent::__construct();
    // TODO: Authority verify.
  }

  public function shoppingCar() {
    $data = array();
    $this->load->model('PSW/ProductModel');
    $this->load->model('PSW/FreightModel');
    $this->load->model('selldarity/UserProductModel');
    $this->load->model('selldarity/WalletModel');

    $data = $this->_getLayoutData($data);
    $data['freight'] = $this->FreightModel->getAllFreight();
    $data['shoppingCar']['products'] = $this->_getUserProducts($this->ProductModel, $this->UserProductModel, 'shoppingCar');
    $data['shoppingCar']['totalPrice'] = $this->_getTotalPrice($data['shoppingCar']['products']);
    $data['shoppingCar']['freight'] = $this->_getFreight($data['freight']);
    $data['userProductView'] = $this->load->view("product/shoppingCar", $data, true);
    unset($data['shoppingCar']);
    $data['category'] = 'shoppingCar';
    $data['deposit'] = $this->is_login() ? $this->WalletModel->getDepositByUserId($this->_userInfo['user_id']) : 0 ;
    $this->load->view('product/productsManage', $data);
  }

  private function _getTotalPrice($products) {
    $amount = 0;
    $numOf = array_column($products, 'number');
    $prices = $this->is_login()
    ? array_column($products, 'off_price')
    : array_column($products, 'ori_price');

    foreach ($numOf as $key => $num) {
      $amount += ($num * $prices[$key]);
    }

    return $amount;
  }

  private function _getFreight($freight) {
    // TODO: Freight calculate
    return array_pop($freight)['fee'];
  }

  public function warehouse() {
    $data = array();
    $this->load->model('PSW/ProductModel');
    $this->load->model('PSW/FreightModel');
    $this->load->model('selldarity/UserProductModel');
    $this->load->model('selldarity/WalletModel');

    $data = $this->_getLayoutData($data);
    $data['warehouse']['products'] = $this->_getUserProducts($this->ProductModel, $this->UserProductModel, 'warehouse');
    $data['warehouse']['totalPrice'] = $this->_getTotalPrice($data['warehouse']['products']);
    $data['userProductView'] = $this->load->view("product/warehouse", $data, true);
    unset($data['warehouse']);
    $data['category'] = 'warehouse';
    $data['freight'] = $this->FreightModel->getAllFreight();
    $data['deposit'] = $this->is_login() ? $this->WalletModel->getDepositByUserId($this->_userInfo['user_id']) : 0 ;
    $this->load->view('product/productsManage', $data);
  }

  public function myMarket() {
    $data = array();
    $this->load->model('PSW/ProductModel');
    $this->load->model('PSW/FreightModel');
    $this->load->model('selldarity/UserProductModel');
    $this->load->model('selldarity/WalletModel');

    $data = $this->_getLayoutData($data);
    $data['myMarket']['products'] = $this->_getUserProducts($this->ProductModel, $this->UserProductModel, 'myMarket');
    $data['userProductView'] = $this->load->view("product/myMarket", $data, true);
    unset($data['myMarket']);
    $data['category'] = 'myMarket';
    $data['freight'] = $this->FreightModel->getAllFreight();
    $data['deposit'] = $this->is_login() ? $this->WalletModel->getDepositByUserId($this->_userInfo['user_id']) : 0 ;
    $this->load->view('product/productsManage', $data);
  }

  public function ajaxDeleteStoreProduct() {
    $this->_ajaxReturn(true);
    exit;
    $this->load->model('selldarity/UserProductModel');
    $idx = $this->input->post('idx');
    $rtn = $this->UserProductModel->deleteStoreProductByIdx($idx);
    if ($rtn == 'ERROR') {
        log_message('error', 'Store Product Delete Error.');
    }
  }
}
