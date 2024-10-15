<?php

  session_start();
  echo "Loging out...";
  $_SESSION['email']="";
  
  echo "<script>window.location.href='userLogin'</script>";

?>