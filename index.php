<?php

$connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
session_start();
if ($_SESSION['firstname']) {
  if (time() - $_SESSION["last_login_timestamp"] > 60) {
    $_SESSION["logoff"]++;
    echo "<script>
           window.location.href = 'login.php';
         </script>";
  }
  elseif (!$_SESSION['firstname']) {
    $_SESSION["logoff"]++;
    echo "<script>
           window.location.href = 'login.php';
         </script>";
  }
}



$paymentsQuery = "SELECT * FROM payments";
$studentsQuery = "SELECT * FROM students";
$coursesQuery = "SELECT * FROM courses";
$usersQuery = "SELECT * FROM users";



//paymentsResuts
$results = mysqli_query($connection, $paymentsQuery);
$payments = mysqli_num_rows($results);

//coursesResuts
$results1 = mysqli_query($connection, $coursesQuery);
$courses = mysqli_num_rows($results1);



//studentsResuts
$results2 = mysqli_query($connection, $studentsQuery);
$students = mysqli_num_rows($results2);

//usersQuery
$results3 = mysqli_query($connection, $usersQuery);
$users = mysqli_num_rows($results3);





 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>E-Classe | Dashboard</title>
  </head>
  <body class=" overflow-hidden d-flex">

     <?php // IDEA: sidebar ?>
     <?php include 'php/sidebar.php'; ?>

        <?php // IDEA: nav ?>
        <?php include 'php/navbar.php'; ?>
        <?php // IDEA: content ?>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-sm-6 col-lg-3 p-2">
                    <div class="p-2" style="background: #F0F9FF;border-radius: 5px;">
                        <i class="bi bi-mortarboard fs-3" style="color: #74C1ED;"></i>
                        <p class="mb-5">Students</p>
                        <p class="text-end fw-bold fs-5"><?php echo $students ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-2">
                    <div class="p-2" style="background: #FEF6FB;border-radius: 5px;">
                        <i class="bi bi-bookmark fs-3" style="color: #EE95C5;"></i>
                        <p class="mb-5">Course</p>
                        <p class="text-end fw-bold fs-5"><?php echo $courses ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-2">
                    <div class="p-2" style="background: #FEFBEC;border-radius: 5px;">
                        <i class="bi bi-currency-dollar fs-3" style="color: #74C1ED;"></i>
                        <p class="mb-5">Payments</p>
                        <p class="text-end fw-bold fs-5">DHS 556,000</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-2">
                    <div class="p-2" style="background: linear-gradient(110.42deg, #00C1FE 18.27%, #FAFFC1 91.84%);border-radius: 6px;">
                        <i class="bi bi-person text-white fs-3"></i>
                        <p class="mb-5 text-white">Users</p>
                        <p class="text-end fw-bold fs-5"><?php echo $users; ?></p>
                    </div>

                </div>

            </div>
        </div>




      </div>







      <style>
        @media screen and (max-width:750px) {
          .side_bar{
            display:none;
          }
          .side_bar.active{
            display:block;
          }
        }
      </style>










    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
