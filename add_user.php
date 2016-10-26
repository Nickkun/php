<?php
  include './database.php';

  $id = $_POST['id'];
  $name = $_POST['name'];
  $password = md5($_POST['password']);

  // 1. 사용자가 가입하고자 하는 id가 존재하는지 확인한다.
  $sql = 'SELECT * FROM user WHERE user_id="'.$id.'"';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $check_user = $stmt->fetchAll();
  if (count($check_user) > 0) {
    //   1의 상황일 경우, 회원가입 페이지로 다시 돌아간다.
    echo '<script>alert("해당 아이디가 이미 존재합니다.")</script>';
    echo '<script>location.href="./signup.php";</script>';
  } else {
    // 2. id 가 존재하지 않으면, 사용자 정보를 user 테이블에 추가한다.
    $sql = 'INSERT INTO user (user_id, user_password, user_name, role) VALUES ("'.$id.'", "'.$password.'", "'.$name.'", 9)';
    $stmt = $conn->prepare($sql);
    $check_add_user = $stmt->execute();
    // 3. 1,2의 상황에 따라 결과 페이지로 이동한다.
    if ($check_add_user) {
      echo '<script>alert("회원가입에 성공했습니다. 로그인하세요.")</script>';
      echo '<script>location.href="/";</script>';
    } else {
      echo '<script>alert("가입에 실패했습니다. 다시 시도해주세요.")</script>';
      echo '<script>location.href="./signup.php";</script>';
    }
  }
?>
