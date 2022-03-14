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


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>E-Classe | Payment</title>
  </head>
  <body class=" overflow-hidden d-flex">
      <?php // IDEA: sidebar ?>
      <?php include 'php/sidebar.php'; ?>
      <?php // IDEA: navbar ?>
      <div class="flex-column w-100">
        <?php include 'php/navbar.php'; ?>
        <!-- IDEA: content-nav -->
        <div class="mx-5 my-3 d-flex justify-content-between  ">
          <h2 class="fs-2 m-0">Payment Details</h2>
          <div>
            <a href="#"><svg class="mx-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
            </svg></a>
          </div>
        </div>
        <!-- IDEA: content -->
        <div class="mx-5 my-5">
          <div class="my-3 shadow-sm rounded shadow-4 rounded-5 overflow-auto">
            <table class="table align-middle mb-0 bg-white">
              <thead class="bg-light">
                <tr>
                  <th class="py-3">Name</th>
                  <th class="py-3">Payment Schedule</th>
                  <th class="py-3">Bill Number</th>
                  <th class="py-3">Amount Paid</th>
                  <th class="py-3">Balance Amount</th>
                  <th class="py-3">Date</th>
                  <th class="py-3"></th>
                </tr>
              </thead>
              <div class="my-2">
                <tbody>
                  <?php


                    // connecting to the database
                    $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
                    $query = "SELECT id, name, payment, bill, amount, balance, date FROM payments";

                    $results = mysqli_query($connection, $query);

                    if (!$results) {
                      die('Query failed.' . mysqli_error());
                    }


                    //printing results


                    while($row = mysqli_fetch_assoc($results)){

                      echo'

                      <tr>
                      <th class="fw-normal py-3">'.$row['name'].'</th>
                      <th class="fw-normal py-3">'.$row['payment'].'</th>
                      <th class="fw-normal py-3">'.$row['bill'].'</th>
                      <th class="fw-normal py-3">'.$row['amount'].'</th>
                      <th class="fw-normal py-3">'.$row['balance'].'</th>
                      <th class="fw-normal py-3">'.$row['date'].'</th>
                      <th class="fw-normal">'.'<a href="display.php?view='.$row['id'].'"><i class="bi bi-eye"></i></a>'.'</th>
                      </tr>

                      ';
                    }


                    // displaying info w an array

                    // $payments = array(
                    //   array("name"=>"Karthi", "payment"=>"First", "bill"=>"00012223" , "amount"=>"DHS 500,000", "balance"=>"05-Jan,2022", "date"=>"08-Dec,2021"),
                    //   array("name"=>"Karthi", "payment"=>"First", "bill"=>"00012223" , "amount"=>"DHS 500,000", "balance"=>"05-Jan,2022", "date"=>"08-Dec,2021"),
                    //   array("name"=>"Karthi", "payment"=>"First", "bill"=>"00012223" , "amount"=>"DHS 500,000", "balance"=>"05-Jan,2022", "date"=>"08-Dec,2021"),
                    //   array("name"=>"Karthi", "payment"=>"First", "bill"=>"00012223" , "amount"=>"DHS 500,000", "balance"=>"05-Jan,2022", "date"=>"08-Dec,2021")
                    // );
                    // foreach($payments as $p_list) {
                    //   echo '<tr>';
                    //   echo '<th class="fw-normal py-3">'.$p_list['name'].'</th>';
                    //   echo '<th class="fw-normal py-3">'.$p_list['payment'].'</th>';
                    //   echo '<th class="fw-normal py-3">'.$p_list['bill'].'</th>';
                    //   echo '<th class="fw-normal py-3">'.$p_list['amount'].'</th>';
                    //   echo '<th class="fw-normal py-3">'.$p_list['balance'].'</th>';
                    //   echo '<th class="fw-normal py-3">'.$p_list['date'].'</th>';
                    //   echo '<th class="fw-normal py-3"> </th>';
                    //   echo '</tr>';
                    // };
                   ?>


                </tbody>
              </div>
            </table>

          </div>

        </div>
      </div>


      <?php

      $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
      $query = "SELECT id, name, payment, bill, amount, balance, date FROM payments";

      $results = mysqli_query($connection, $query);


       ?>














    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
  </body>
</html>
