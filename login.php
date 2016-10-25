<?php
  include './database.php';
  session_start();

  $id = $_POST['loginid'];
  $password = md5($_POST['loginpw']);

  $sql = 'SELECT * FROM user WHERE user_id="'.$id.'" AND user_password="'.$password.'"';
  // SELECT * FROM user WHERE id="아이디값" AND password="비밀번호값"
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $user = $stmt->fetchAll();

  if (count($user) > 0) {
    $result = $user[0];
    $_SESSION['is_logged'] = true;
    $_SESSION['user_id'] = $user[0]['user_id'];
    $_SESSION['role'] = $user[0]['role'];
    $_SESSION['timestamp'] = $user[0]['timestamp'];
  } else {
    $result = array();
  }

  echo json_encode($result);
?>
