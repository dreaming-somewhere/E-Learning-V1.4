<?php
  $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
  if (!isset($_SESSION)) {
    session_start();
  }



 ?>

<div style="background:#faffc1; width:320px;" class="vh-100 side_bar sideb">
  <div class="container">
    <!-- IDEA: logo -->
    <div class="d-flex p-3">
      <h4 style="color:#00c1fe" class="fw-bolder d-inline">|&nbsp;</h4>
      <h4 style="font-weight:600;">E-Classe</h4>
    </div>
    <!-- IDEA: user_profile -->
    <div class="d-flex justify-content-center align-items-center">
      <div class="d-flex flex-column text-center">
        <img src="./imgs/profile.png" alt="user_profile_img" width="150px" class="d-block rounded-circle align-self-center my-4">
        <div class="">
          <h3><?php echo $_SESSION['firstname']; ?></h3>
          <p style="color:#1fc9f6;">Admin</p>
        </div>
      </div>
    </div>
    <!-- IDEA: nav_buttons -->
    <div class="">
      <div class="d-flex flex-column align-items-center justify-content-center my-5">
        <a href="./index.php" class="rounded p-2 px-5 m-2 text-decoration-none text-dark"><i style="margin-right:10px;" class="bi bi-house-door"></i>Home</a>
        <a href="./courses.php" class="p-2 px-5 m-2 text-decoration-none text-dark"><i style="margin-right:10px;" class="bi bi-bookmark"></i>Course</a>
        <a href="./students.php" class="p-2 px-5 m-2 text-decoration-none text-dark"><i style="margin-right:10px;" class="bi bi-people"></i>Students</a>
        <a href="./payment.php" class="p-2 px-5 m-2 text-decoration-none text-dark"><i style="margin-right:10px;" class="bi bi-currency-dollar"></i>Payment</a>
        <a href="#" class="p-2 px-5 m-2 text-decoration-none text-dark"><i style="margin-right:10px;" class="bi bi-file-bar-graph"></i>Report</a>
        <a href="#" class="p-2 px-5 m-2 text-decoration-none text-dark"><i style="margin-right:10px;" class="bi bi-gear-wide-connected"></i>Settings</a>
        <a href="./logout.php" style="margin-top:170px !important;" class="p-2 px-5 m-2 text-decoration-none text-dark">Logout<i style="margin-left:10px;" class="bi bi-door-closed"></i></a>
      </div>
    </div>
  </div>

 </div>
