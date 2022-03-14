<?php
  session_start();
  if(isset($_SESSION['id_session']))
  {
    $user = $_SESSION['id_session']; 
  }
  else{
    session_destroy();
    header("location: ../index.php?msg=Voce foi expulso");
  }
?>