<?php
  include './database.php';

  $id = $_POST['loginid'];
  $password = md5($_POST['loginpw']);

  $sql = 'SELECT * FROM user WHERE user_id="'.$id.'" AND user_password="'.$password.'"';
  // SELECT * FROM user WHERE id="아이디값" AND password="비밀번호값"
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $user = $stmt->fetchAll();

  // if (count($user) > 0) {
  //   $result = $user[0];
  // } else {
  //   $result = array();
  // }

  echo json_encode($user[0]);
?>
