<?php
  session_start();
  $_SESSION["logoff"]++;
  echo "<script>
         window.location.href = 'login.php';
       </script>";




 ?>
