<?php
  session_start();

  if (isset($_SESSION['user']))
    header("Location:"."..");

  include("../view/WIP.view.php");
?>
