<?php  $id = $_GET['edit'];
if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $enroll = $_POST['enroll'];
   $date = $_POST['date'];

     $connection = mysqli_connect('localhost', 'root', '', 'e_classe_db');


   $query = "UPDATE students set id= '$id', name= '$name', email= '$email', phone= '$phone', enroll= '$enroll', date= '$date' WHERE id= $id";

   $results = mysqli_query($connection, $query);



 } ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
  </head>
  <body>

    <div class="vh-100 justify-content-center align-items-center mx-auto d-flex">
      <form action="students.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input name="name" type="text" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Email</label>
          <input name="email" type="email" class="form-control " id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Phone</label>
          <input name="phone" type="text" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enroll Number</label>
          <input name="enroll" type="text" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Date of Admission</label>
          <input name="date" type="text" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
        </div>
        <button name="submit" type="submit" value="post" class="mt-2 btn btn-primary">Edit</button>
      </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
