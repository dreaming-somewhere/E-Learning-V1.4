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
    <title>E-Classe | Course</title>
  </head>
  <body class=" overflow-hidden d-flex">
      <?php // IDEA: sidebar ?>
      <?php include 'php/sidebar.php'; ?>
      <?php // IDEA: navbar ?>
      <div class="flex-column w-100">
        <?php include 'php/navbar.php'; ?>
        <!-- IDEA: content-nav -->
        <div class="mx-5 my-3 d-flex justify-content-between  ">
          <h2 class="fs-2 m-0">Courses</h2>
          <div>
            <a href="#"><svg class="mx-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
            </svg></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Add a new course
            </button>
          </div>
        </div>
        <!-- IDEA: content -->
        <div class="mx-5 my-5">
          <div class="my-3 shadow-sm rounded shadow-4 rounded-5 overflow-auto">
            <table class="table align-middle mb-0 bg-white">
              <thead class="bg-light">
                <tr>
                  <th></th>
                  <th class="py-3 px-3">Name</th>
                  <th class="py-3">Email</th>
                  <th class="py-3">Phone</th>
                  <th class="py-3">Enroll Number</th>
                  <th class="py-3">Date of admission</th>
                  <th class="py-3">&nbsp;</th>
                  <th class="py-3">&nbsp;</th>
                </tr>
              </thead>

              <div class="my-2">
                <tbody>
                  <?php


                   // if (isset($_POST["submit"])) {
                   //   if (file_exists('studednts.json')) {
                   //      $data = array(
                   //        'name' => $_POST['name'],
                   //        'email' => $_POST['email'],
                   //        'phone' => $_POST['phone'],
                   //        'enroll' => $_POST['enroll'],
                   //        'date' => $_POST['date'],
                   //      );
                   //       $final_data = json_encode($data);
                   //
                   //   }
                   // }


                   //rewritten

                   if (isset($_POST['submit'])) {

                     $name = $_POST['name'];
                     $email = $_POST['email'];
                     $phone = $_POST['phone'];
                     $enroll = $_POST['enroll'];
                     $date = $_POST['date'];

                       $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');


                     $query = "INSERT INTO courses(name, email, phone, enroll, date) ";
                     $query .= "VALUES ('$name', '$email', '$phone', '$enroll', '$date' )";

                     $results = mysqli_query($connection, $query);

                     echo "<script>
                            window.location.href = 'courses.php';
                          </script>";


                   }





                   $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
                     $query = "SELECT id, name, email, phone, enroll, date FROM courses";

                   $results = mysqli_query($connection, $query);

                   if (!$results) {
                     die('Query failed.' . mysqli_error());
                   }


                   //printing results

                   ?>
                   <?php
                   while($row = mysqli_fetch_assoc($results)){

                     ?>
                            <tr>
                             <th class="fw-normal"> <img src="./imgs/placeholder.png" width="60px" alt=""> </th>
                              <th class="fw-normal"><?php echo $row['name']; ?> </th>
                              <th class="fw-normal"><?php echo $row['email']; ?> </th>
                              <th class="fw-normal"><?php echo $row['phone']; ?> </th>
                              <th class="fw-normal"><?php echo $row['enroll']; ?> </th>
                              <th class="fw-normal"><?php echo $row['date']; ?> </th>
                              <th class="fw-normal"><a href="edit0.php?edit=<?php echo $row['id']; ?> "><i class="bi bi-pencil"></i></a></th>
                              <th class="fw-normal"><a href="courses.php?delete=<?php echo $row['id']; ?> "><i class="bi bi-trash"></i></a></th>
                            </tr>

                            <?php


                            }

                            if (isset($_GET['delete'])) {
                              $id = $_GET['delete'];
                              $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
                              $query = "DELETE FROM courses WHERE id=$id";
                              $results = mysqli_query($connection, $query);
                              if ($results) {
                                echo '<div class="alert alert-success" role="alert">
                                Succesfully deleted! Please refresh the page.
                                </div>';
                              }



                             ?>




                             <?php
                 }


                 // if (isset($_GET['delete'])){
                 //   $anId = $_GET['delete'];
                 //   $sql = ("DELETE FROM students WHERE id="$anID") or die($mysqli -> error());
                 //   $newRes = mysqli_query($connection, $sql);
                 //   if ($newRes) {
                 //     echo "sdfsf";
                 //   }
                 //   else {
                 //     die(mysqli_error($connection));
                 //   }
                 // }

                  ?>
                 <?php
                   //getting input from the JSON file

                   // $std_list = file_get_contents('students.json');
                   // $stds = json_decode($std_list);
                   //
                   // foreach ($stds as $key => $value) {
                   //       echo '<tr>';
                   //       echo '<th class="fw-normal"> <img src="./imgs/placeholder.png" width="60px" alt=""> </th>';
                   //       echo '<th class="fw-normal">'.$stds[$key]->name.'</th>';
                   //       echo '<th class="fw-normal">'.$stds[$key]->email.'</th>';
                   //       echo '<th class="fw-normal">'.$stds[$key]->phone.'</th>';
                   //       echo '<th class="fw-normal">'.$stds[$key]->enroll.'</th>';
                   //       echo '<th class="fw-normal">'.$stds[$key]->date.'</th>';
                   //       echo '<th class="fw-normal">'.'<a href="#"><i class="bi bi-eye"></i></a>'.'</th>';
                   //       echo '<th class="fw-normal">'.'<a href="#"><i class="bi bi-pencil"></i></a>'.'</th>';
                   //       echo '</tr>';
                   // };

                   //some retries

                   // for ($i=0; $i <= $std_count ; $i++) {
                   //     echo '<tr>';
                   //     echo '<th class="fw-normal"> <img src="./imgs/placeholder.png" width="60px" alt=""> </th>';
                   //     echo '<th class="fw-normal">'.$stds[$i]->name.'</th>';
                   //     echo '<th class="fw-normal">'.$stds[$i]->email.'</th>';
                   //     echo '<th class="fw-normal">'.$stds[$i]->phone.'</th>';
                   //     echo '<th class="fw-normal">'.$stds[$i]->enroll.'</th>';
                   //     echo '<th class="fw-normal">'.$stds[$i]->date.'</th>';
                   //     echo '</tr>';
                   //     $i++;
                   // };

                  // foreach($std_list as $std) {
                  //   echo '<tr>';
                  //   echo '<th class="fw-normal"> <img src="./imgs/placeholder.png" width="60px" alt=""> </th>';
                  //   echo '<th class="fw-normal">'.$std->name.'</th>';
                  //   echo '<th class="fw-normal">'.$std->email.'</th>';
                  //   echo '<th class="fw-normal">'.$std->phone.'</th>';
                  //   echo '<th class="fw-normal">'.$std->enroll.'</th>';
                  //   echo '<th class="fw-normal">'.$std->date.'</th>';
                  //   echo '</tr>';
                  // };
                   ?>
               </tbody>
              </div>
            </table>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        </div>
      </div>
      <!-- Add Modal-->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add a new course</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="courses.php" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Name</label>
                  <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Phone</label>
                  <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Enroll Number</label>
                  <input name="enroll" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Date of Admission</label>
                  <input name="date" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <button name="submit" type="submit" value="post" class="mt-2 btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
  </body>
</html>
