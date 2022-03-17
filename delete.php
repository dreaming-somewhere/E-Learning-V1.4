<?php

  $id = $_GET['id'];
  $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
  $query = "DELETE FROM students WHERE id=$id";
  $results = mysqli_query($connection, $query);


  if ($results) {
    session_start();
    $_SESSION["deleted"]++;
    echo "<script>
           window.location.href = 'students.php';
         </script>";
  }




 ?>
