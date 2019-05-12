<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class SELLDARITY_Controller extends CI_Controller {
  protected $_now = 0;
  protected $_formattedNow = '';
  protected $_baseUrl = '';
  protected $_userInfo = '';

  private $_categorityConfig = [
    'shoppingCar' => 1,
    'warehouse' => 2,
    'myMarket' => 3,
  ];

  public function __construct() {
    parent::__construct();
    $this->_now = $this->input->server('REQUEST_TIME');
    $this->_formattedNow = date('Y-m-d H:i:s', $this->_now);
    $this->_baseUrl = "http://".base_url();
    $this->_userInfo = $this->session->userdata('user') ? $this->session->userdata('user') : array();
    $this->_getStrangerId();
  }

  protected function _auth() {
    if (!$this->session->userdata('user')) {
      header("Location: {$this->_baseUrl}");
      exit;
    }
  }

  protected function _getLayoutData($data = array()) {
    $data['baseUrl'] = $this->_baseUrl;
    $data['user_id'] = isset($this->_userInfo['user_id']) ? $this->_userInfo['user_id'] : '';
    $data['stranger_id'] = $this->_userInfo['stranger_id'];
    $data['userName'] = isset($this->_userInfo['name']) ? $this->_userInfo['name'] : '';
    $data['level'] = isset($this->_userInfo['level']) ? $this->_userInfo['level'] : '';
    $data['recommendCode'] = isset($this->_userInfo['recommend_code']) ? $this->_userInfo['recommend_code'] : '';
    $data['picture'] = isset($this->_userInfo['picture']) ? $this->_userInfo['picture'] : '';
    $data['layouthead'] = $this->load->view('layout/layouthead', $data, true);
    $data['layoutbody'] = $this->load->view('layout/layoutbody', $data, true);
    return $data;
  }

  private function _getStrangerId() {
    if (!($this->_userInfo['stranger_id'] = $this->input->cookie('strangerId', true))) {
        $this->_userInfo['stranger_id'] = hash('md5', $this->_formattedNow);
        $this->input->set_cookie('strangerId', $this->_userInfo['stranger_id'], STRANGER_ID_EXPIRE);
    }
  }

  protected function _groupByValue($allData, $groupBy) {
    $rtn = array();

    foreach ($allData as $data) {
      $rtn[$data[$groupBy]][] = $data;
    }

    return $rtn;
  }

  protected function _calOffItem($products, $SaleModel) {
    $productsId = array_column($products, 'idx');
    $productsSaleNum = $SaleModel->getProdutsSaleNumByProductsId($productsId);
    $productsSaleNum = array_combine(array_column($productsSaleNum, 'product_id'), $productsSaleNum);

    foreach ($products as &$product) {
      $product['off_price'] = $this->_getOffPrice($product);
      $saledNum = isset($productsSaleNum[$product['idx']]) ? $productsSaleNum[$product['idx']]['total'] : 0;
      $product['toShipPercent'] = $this->_getToShipPercent($product['ship_num'], $saledNum);
      $product['to_ship'] = $product['ship_num'] - $saledNum;
    }

    return $products;
  }

  protected function is_login() {
    return $this->session->userdata('user') ? true : false;
  }

  protected function _getToShipPercent($ship_Num, $saledNum) {
     return floor(100*($saledNum/$ship_Num));
  }

  protected function _getOffPrice($product) {
     return floor($product['ori_price']*((100-$product['off_percent'])/100));
  }

  protected function _ajaxReturn($rtn) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rtn, JSON_UNESCAPED_UNICODE);
  }

  protected function _getUserProducts($ProductModel, $UserProductModel, $category = '') {
    $products = array();
    $distinct_id = isset($this->_userInfo['user_id']) ? $this->_userInfo['user_id'] : $this->_userInfo['stranger_id'];
    $userProducts = $category
    ? $UserProductModel->getUserProductsByDistictIdAndCategory($distinct_id, $this->_categorityConfig[$category])
    : $UserProductModel->getUserProductsByDistictId($distinct_id);

    if ($userProducts) {
      $this->load->model('PSW/SaleModel');
      $productsInfo = $ProductModel->getProductByIds($productsId = array_unique(array_column($userProducts, 'product_id')));
      $productsInfo = array_combine(array_column($productsInfo, 'idx'), $productsInfo);
      foreach ($userProducts as &$product) {
        $product = array_merge($product, $productsInfo[$product['product_id']]);
        $product['off_price'] = $this->_getOffPrice($product);
      }
      $userProducts = $this->_calOffItem($userProducts, $this->SaleModel);
    }

    return $userProducts;
  }

  protected function _base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
  }

  protected function _base64_decode($data) {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }
}
