<?php
if (defined('ENVITONMENT') && ENVIRONMENT == 'development' ) {
  define('DB_DATABASE', 'selldarity');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'way11229');
  define('DB_HOST', '127.0.0.1');
} else {
  define('DB_DATABASE', '');
  define('DB_USERNAME', '');
  define('DB_PASSWORD', '');
  define('DB_HOST', '');
}

$dbLink = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=utf8";
global $_db;
$_db = new PDO($dbLink, DB_USERNAME, DB_PASSWORD);
