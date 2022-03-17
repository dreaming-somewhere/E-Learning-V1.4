<?php
$connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
session_start();
if ($_SESSION['firstname']) {
  if (time() - $_SESSION["last_login_timestamp"] > 900) {
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
                     if ($results) {
                       echo "<script>
                       window.location.href = 'courses.php';
                       </script>";

                     }


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
                   $index = 0;
                   while($row = mysqli_fetch_assoc($results)){

                     ?>
                            <tr>
                             <th class="fw-normal"> <img src="./imgs/placeholder.png" width="60px" alt=""> </th>
                              <th class="fw-normal"><?php echo $row['name']; ?> </th>
                              <th class="fw-normal"><?php echo $row['email']; ?> </th>
                              <th class="fw-normal"><?php echo $row['phone']; ?> </th>
                              <th class="fw-normal"><?php echo $row['enroll']; ?> </th>
                              <th class="fw-normal"><?php echo $row['date']; ?> </th>
                              <?php echo '
                                    <td class="mytd">
                                    <!-- Modal start -->
                                    <div class="modal fade" id="exampleModal'.$index.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$index.'" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel'.$index.'">User deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            Are you sure you want  to delete the following user '.$row['name'].' ?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="./delete_courses.php?id='.$row['id'].'" type="button" class="btn btn-danger">Delete student</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                        <a href="./edit.php?id='.$row['id'].'"><svg class="smg1" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.3033 2.08777L16.9113 0.695801C16.4478 0.231934 15.8399 0 15.2321 0C14.6242 0 14.0164 0.231934 13.5525 0.69543L0.475916 13.772L0.00462689 18.0107C-0.0547481 18.5443 0.365701 19 0.88783 19C0.920858 19 0.953885 18.9981 0.987654 18.9944L5.22332 18.5265L18.3036 5.44617C19.231 4.51881 19.231 3.01514 18.3033 2.08777ZM4.67818 17.3924L1.2259 17.775L1.61035 14.3175L11.4031 4.52475L14.4747 7.59629L4.67818 17.3924ZM17.4639 4.60676L15.3141 6.7565L12.2426 3.68496L14.3923 1.53521C14.6164 1.31107 14.9148 1.1875 15.2321 1.1875C15.5494 1.1875 15.8474 1.31107 16.0719 1.53521L17.4639 2.92719C17.9266 3.39031 17.9266 4.14363 17.4639 4.60676Z" fill="#00C1FE"/></svg></a>
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal'.$index.'">
                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.285713 2.25H4L5.2 0.675C5.35968 0.465419 5.56674 0.295313 5.80478 0.178154C6.04281 0.0609948 6.30529 0 6.57143 0L9.42857 0C9.69471 0 9.95718 0.0609948 10.1952 0.178154C10.4333 0.295313 10.6403 0.465419 10.8 0.675L12 2.25H15.7143C15.7901 2.25 15.8627 2.27963 15.9163 2.33238C15.9699 2.38512 16 2.45666 16 2.53125V3.09375C16 3.16834 15.9699 3.23988 15.9163 3.29262C15.8627 3.34537 15.7901 3.375 15.7143 3.375H15.0393L13.8536 16.4637C13.8152 16.8833 13.6188 17.2737 13.3029 17.558C12.987 17.8423 12.5745 17.9999 12.1464 18H3.85357C3.42554 17.9999 3.01302 17.8423 2.69711 17.558C2.38121 17.2737 2.18477 16.8833 2.14643 16.4637L0.960713 3.375H0.285713C0.209937 3.375 0.137264 3.34537 0.083683 3.29262C0.0301008 3.23988 0 3.16834 0 3.09375V2.53125C0 2.45666 0.0301008 2.38512 0.083683 2.33238C0.137264 2.27963 0.209937 2.25 0.285713 2.25ZM9.88571 1.35C9.8323 1.28034 9.76324 1.22379 9.68393 1.18475C9.60463 1.14572 9.51723 1.12527 9.42857 1.125H6.57143C6.48277 1.12527 6.39537 1.14572 6.31606 1.18475C6.23676 1.22379 6.1677 1.28034 6.11429 1.35L5.42857 2.25H10.5714L9.88571 1.35ZM3.28571 16.3617C3.29748 16.5019 3.36245 16.6325 3.46768 16.7277C3.57292 16.8228 3.7107 16.8754 3.85357 16.875H12.1464C12.2893 16.8754 12.4271 16.8228 12.5323 16.7277C12.6376 16.6325 12.7025 16.5019 12.7143 16.3617L13.8929 3.375H2.10714L3.28571 16.3617Z" fill="#00C1FE"/>
                                            </svg>
                                        </button>
                                    </td>
                                    ';
                                    echo '</tr>';
                                    $index++; ?>
                            </tr>

                            <?php


                            }
                            if ($_SESSION["deleted"]) {
                              echo '<div class="position-relative bot-0 alert alert-danger alert-dismissible text-center fade show" role="alert">
                              Succesfully deleted.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              $_SESSION["deleted"] = 0;
                            }
                            if (isset($_GET['delete'])) {
                              $id = $_GET['delete'];
                              $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
                              $query = "DELETE FROM courses WHERE id=$id";
                              $results = mysqli_query($connection, $query);
                              if ($results) {
                                $_SESSION["deleted"]++;
                                echo "<script>
                                       window.location.href = 'students.php';
                                     </script>";
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
