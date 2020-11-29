<?php
  session_start();
  require_once '../model/db.php';

  if (!isset($_SESSION['u_id'])){
    header("Location: ../login.php");
  }
?>
