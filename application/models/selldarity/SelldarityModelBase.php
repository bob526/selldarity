<?php
include_once __DIR__ . "/../ModelBase.php";

class SelldarityModelBase extends ModelBase {
  public function __construct($table) {
    parent::__construct($this->load->database('selldarity', true), $table);
  }
}
