<?php

class MainModel extends ModelBase {
  private $_table = "main";

  public function __construct() {
    parent::__construct($this->_table);
  }

}
