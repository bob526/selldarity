<?php
define('_DIR_MODEL_', dirname(__FILE__));
include_once _DIR_MODEL_.'/config.php';
include_once _DIR_MODEL_.'/constants.php';
include_once _DIR_MODEL_.'/ErrorHdr.php';


function __autoload($class) {
  if (strpos($class, 'SELLDARITY_') !== false || strpos($class, 'CI_') !== false) {
    return class_exists($class, false);
  } else {
    include_once _DIR_MODEL_."/{$class}.php";
    if (!class_exists($class, false)) {
      $rtn = array(
        'errcode' => ERRCODE_INVALID_CLASS,
        'errmsg' => "Undefined model: {$class}",
      );

      throw new Exception(json_encode($rtn));
    }
    return true;
  }
}

class Model {
  
  public static function load($modelName, $params = array()) {
    $model = null;

    if (class_exists($modelName)) {
      $model = new $modelName($params);
    }

    return $model;
  }
}

