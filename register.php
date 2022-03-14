<?php
  if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // $hashformat = "$2y$10$";
    // $salt = "somestringthathas22char";
    // $hash_n_salt =  $hashformat . $salt;
    // $password = crypt($password, $hash_n_salt);


    // echo $firstname . '<br>';
    // echo $lastname . '<br>';
    // echo $email . '<br>';
    // echo $password . '<br>';


    $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
    $import = "SELECT email, password FROM users";
    $results = mysqli_query($connection, $import);
    $row = mysqli_fetch_assoc($results);

  }





 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>E-Classe | Register</title>
  </head>
  <body style="background: linear-gradient(68deg, rgba(0,193,254,1) 16%, rgba(250,255,193,1) 100%); ">
      <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="mx-auto">
        <?php
        if (isset($_POST['submit'])) {

          if ($row['email'] == $email) {
            echo '<div class="alert alert-danger text-center rounded-3 shadow" role="alert">
                  Email already exists, Please use another one.
                  </div>';
          }


          else {
            $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
            $query = "INSERT INTO users(firstname, lastname, email, password) ";
            $query .= "VALUES ('$firstname', '$lastname', '$email', '$password')";
            $anotherRes = mysqli_query($connection, $query);



            echo '<div class="alert alert-success text-center rounded-3 shadow" role="alert">
                  Account succesfully created! You can <a href="./login.php">login</a> now.
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
            <h3 class="">Register</h3>
            <p class="mx-2">Create an account to access E-Classe</p>
          </div>
          <!-- IDEA: form -->
          <div class="">
            <form action="register.php" method="post">
              <div class="mb-3">
                <label class="form-label">First Name</label>
                <input name="firstname" type="text" class="form-control p-2" placeholder="Enter your first name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input name="lastname" type="text" class="form-control p-2" placeholder="Enter your last name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control p-2" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control p-2" placeholder="Enter your password" required>
              </div>
              <div class="d-grid gap-2 my-4">
              <button type="submit" name="submit" class="btn btn-primary" style="background-color:#00c1fe;">Register</button>
              </div>
              <p class="text-center">Already have an account? <a href="./login.php">Login</a></p>
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
