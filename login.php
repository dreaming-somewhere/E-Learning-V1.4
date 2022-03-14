<?php
  $errormsg = 0;

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>E-Classe | Login</title>
  </head>
  <body style="background: linear-gradient(68deg, rgba(0,193,254,1) 16%, rgba(250,255,193,1) 100%); ">
      <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="mx-auto">
        <?php
          session_start();
          error_reporting(0);
          if ($_SESSION["logoff"]) {
            echo '<div class="alert alert-danger text-center rounded-3 shadow" role="alert">
            Session timed out.
            </div>';
          }
          if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
            $query = "SELECT firstname, lastname, email, password FROM users";

            $results = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($results)) {
              if ($row['email'] == $email && $row['password'] == $password) {
                session_destroy();
                session_start();
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;
                $_SESSION["last_login_timestamp"] = time();
                echo "<script>
                       window.location.href = 'index.php';
                     </script>";

              }

              else {
                $errormsg++;
              }

            }
            if ($errormsg) {
              echo '<div class="alert alert-danger text-center rounded-3 shadow" role="alert">
              Please enter a valid credentials, or <a href="./register.php">Create</a> a new account.
              </div>';
            }

          }

         ?>





        <div class="bg-white shadow p-5" style="border-radius:20px;">
          <!-- IDEA: logo -->
          <div class="d-flex">
            <h2 style="color:#00c1fe" class="fw-bolder d-inline">|</h2>
            <h2 class="m-1 mb-5" style="font-weight:600;">E-Classe</h2>
          </div>
          <div class="text-center mb-5 mx-5">
            <h3 class="text-uppercase">Sign in</h3>
            <p class="mx-2">Enter your credentias to access your account</p>
          </div>
          <!-- IDEA: form -->
          <div class="">
            <form action="login.php" method="post">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control p-2" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control p-2" placeholder="Enter your password" required>
              </div>
              <div class="d-grid gap-2 my-4">
              <button type="submit" name="submit" class="btn btn-primary text-uppercase" style="background-color:#00c1fe;">Sign in</button>
              </div>
              <p class="text-center">Forgot your Password? <a href="#">Reset Password</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>













    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
