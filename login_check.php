<?php
  session_start();
  if (!isset($_SESSION['is_logged'])) {
    $_SESSION['is_logged'] = false;
  }
  echo json_encode($_SESSION);
?>
