<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends SELLDARITY_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function mainPage($productDepartment = 1) {
    $data = array();
    $this->load->model('selldarity/UserProductModel');
    $this->load->model('PSW/ProductModel');
    $this->load->model('PSW/DepartmentsModel');
    $this->load->model('PSW/SaleModel');

    $data["registeredInfo"] = $this->_verificationCheck($user_id = $this->input->get('i'), $verificationCode = $this->input->get('ver'));

    $data = $this->_getLayoutData($data);
    $data['productDepartment'] = $productDepartment;
    $departments = $this->DepartmentsModel->getAllDepartments();
    $data["allDepartments"] = array_combine(array_column($departments, 'idx'), $departments);

    $data["products"] = $this->_calOffItem($this->ProductModel->getProductsByDepartment($productDepartment), $this->SaleModel);

    $data = array_merge(
      $data,
      $this->_groupByValue($this->_getUserProducts($this->ProductModel, $this->UserProductModel), 'category')
    );

    $this->load->view('mainPage/home', $data);
  }

  public function ajaxGetDropProduct() {
    $this->load->model('PSW/ProductModel');
    $this->load->model('PSW/UserProductModel');

    $pid = $this->input->post("Pidx");
    $uid = $this->input->post("Uidx");
    $type = $this->input->post("type");

    $data = array();
    $data["product"] = $this->ProductModel->getProductById($pid);
    $data["product"]['off_Price'] = $this->_getOffPrice($data['product']);

    if ($storeProduct = $this->UserProductModel->getStoreProductByUidPidType($uid, $pid, $type)) {
      $data['numOfStoreProduct'] = $storeProduct['number'];
      $data['storeProductId'] = $storeProduct['idx'];
    } else {
      $data['numOfStoreProduct'] = 0;
      $data["storeProductId"] = $this->UserProductModel->insert($uid, $pid, $type, $this->_formattedNow);
    }

    $this->_ajaxReturn($data);
  }

  public function ajaxLogin() {
    $rtn = '';
    $postData = array(
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password')
    );
    $this->load->library('Authority', array(), 'auth');
    $authRtn = $this->auth->authAPI('login', $postData);
    if ($userData = $authRtn['result']) {
      $this->session->set_userdata('user', array(
        "user_id" => $userData['user_id'],
        "name" => $userData['name'],
        "level" => $userData['level'],
        "email" => $userData['email'],
        "phone" => $userData['phone'],
        "gender" => $userData['gender'],
        "birthday" => $userData['birthday'],
        "picture" => $userData['picture_url'],
        "recommend_code" => $userData['recommend_code'],
      ));
      $this->_changeDistictIdToUserId($userData['user_id']);
    } else {
      $rtn = $authRtn['message'];
    }
    $this->_ajaxReturn($rtn);
  }

  public function ajaxRegister() {
    $email = $this->input->post('email');
    $userName = $this->input->post('userName');
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $postData = array(
      'email' => $email,
      'userName' => $userName,
      'password' => $password
    );
    $this->load->library('Authority', array(), 'auth');
    $authRtn = $this->auth->authAPI('register', $postData);
    $this->_ajaxReturn($authRtn);
  }

  public function logout() {
    $this->session->unset_userdata('user');
    header("Location:{$this->_baseUrl}");
    exit;
  }

  private function _verificationCheck($user_id, $verificationCode) {
    $rtn = '';
    $data = array(
      'baseUrl' => $this->_baseUrl
    );

    if ($user_id && $verificationCode) {
      $this->load->library('Authority', array(), 'auth');
      $postData = array(
        'user_id' => $user_id,
        'verificationCode' => $verificationCode
      );
      $data['verificationRtn'] = $this->auth->authAPI('verificationCheck', $postData);
      if ($data['verificationRtn'] == '') {
        $this->load->model('selldarity/MyMarketModel');
        $this->load->model('selldarity/WalletModel');
        $this->MyMarketModel->insert($user_id, $this->_formattedNow);
        $this->WalletModel->insert($user_id, $this->_formattedNow);
        $this->_changeDistictIdToUserId($user_id);
      }
      $rtn = $this->load->view('mainPage/registeredInfo', $data, true);
    }

    return $rtn;
  }

  private function _changeDistictIdToUserId($user_id) {
      $this->load->model('selldarity/UserProductModel');
      $distinct_id = $this->_userInfo['stranger_id'];
      $this->UserProductModel->updateDistictIdToUserId($distinct_id, $user_id, $this->_formattedNow);
      //TODO remove duplicate rows.
  }

  public function ajaxStoreProduct() {
    $this->load->model('selldarity/UserProductModel');
    $pid = $this->input->post("pid");
    $distinct_id = $this->input->post("distinct_id");
    $category_id = $this->input->post("category_id");
    $storeProductId = $this->UserProductModel->insert($distinct_id, $pid, $category_id, $this->_formattedNow);

    $this->_ajaxReturn($storeProductId);
  }

  public function ajaxSetStoreProductNum() {
    $this->load->model('selldarity/UserProductModel');
    $storeProductData = json_decode($this->input->post('data'), true);
    $storeProductId = array_column($storeProductData, 'idx');
    $storeProductNum = array_column($storeProductData, 'number');

    $this->_ajaxReturn(true);

    $this->UserProductModel->batchUpdateNumById($storeProductNum, $storeProductId, $this->_formattedNow);
    exit;
  }

  public function ajaxGetMarket() {
    // TODO: market selection by random.
    $default = [
      'user_img' => 'user.svg',
      'off_percent' => 30,
      'market' => $this->_base64url_encode(3),
    ];
    $rtn = $default;
    $this->_ajaxReturn($rtn);
  }
}
