<?php
if (defined('ENVIRONMENT') && ENVIRONMENT == 'development' ) {
  define('DB_DATABASE', 'selldarity');
  define('DB_USERNAME', 'nullset');
  define('DB_PASSWORD', 'nullset');
  define('DB_HOST', 'localhost');
} else {
  define('DB_DATABASE', '');
  define('DB_USERNAME', '');
  define('DB_PASSWORD', '');
  define('DB_HOST', '');
}

$dbLink = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=utf8";
global $_db;
$_db = new PDO($dbLink, DB_USERNAME, DB_PASSWORD);
