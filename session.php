<?php
  session_start();
  $is_logged = (isset($_SESSION['is_logged'])) ? $_SESSION['is_logged'] : false;
?>
