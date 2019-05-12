<?php
include_once __DIR__ . "/../ModelBase.php";

class PSWModelBase extends ModelBase {
  public function __construct($table) {
    parent::__construct($this->load->database('PSW', true), $table);
  }
}
