<?php
session_start();
  unset($_SESSION['connected'], $_SESSION['pseudo2']);
  header("Location: index.php");
?>