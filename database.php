<?php
  /* Database 연결 */
  $host = 'mysql:host=localhost;dbname=test';
  $user = 'test';
  $password = '1234';
  $conn = new PDO($host, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
?>
