<?php

  $id = $_GET['edit'];

  $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
  $query = "SELECT * FROM students WHERE id = $id";


  $results = mysqli_query($connection, $query);


  if (!$connection) {
       echo "Connection failed" . mysqli_error();
  }

  $row = mysqli_fetch_assoc($results);

  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $enroll = $row['enroll'];
  $date = $row['date'];


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
  </head>
  <body>

    <div class="vh-100 justify-content-center align-items-center mx-auto d-flex">
      <form action="" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input name="name" type="text" class="form-control" value="<?php echo $name;  ?>" id="exampleInputEmail1"  -describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" value="<?php echo $email;  ?>" id="exampleInputPassword1" >
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Phone</label>
          <input name="phone" type="text" class="form-control" value="<?php echo $phone;  ?>" id="exampleInputEmail1" >
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enroll Number</label>
          <input name="enroll" type="text" class="form-control" value="<?php echo $enroll;  ?>" id="exampleInputEmail1" ->
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Date of Admission</label>
          <input name="date" type="text" class="form-control" value="<?php echo $date;  ?>" id="exampleInputEmail1">
        </div>
        <button name="submit" type="submit"   class="mt-2 btn btn-primary">Edit</button>
      </form>
    </div>

    <?php

    if (isset($_POST['submit'])) {

      $id = $_GET['edit'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $enroll = $_POST['enroll'];
      $date = $_POST['date'];

      $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');
      $query = "UPDATE students SET name = '$name', email = '$email', phone = '$phone', enroll = '$enroll', date = '$date'  WHERE id = $id";
      $results = mysqli_query($connection, $query);

      if($results){
        header('location:students.php');
      }

    }



     ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
