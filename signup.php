<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$inserted=false;
$error=false;
// require('dbConnection.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    // echo "connected with databes";
    require('dbConnection.php');
   $username=$_POST['username'];
   $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if($password==$cpassword)
    {
    $sql = "SELECT sno, username, passwords FROM users WHERE username='$username' ";
   $result = $conn->query($sql);
   
   if ($result->num_rows>0) {

     $error="Username already exist";

   }else{

    $hash=password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, passwords)
VALUES ('$username', '$hash')";

if ($conn->query($sql) === TRUE) {
  $inserted=true;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

   }
    }else
    {
        $error="Password Not matched";
    }


   
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome to Fuctionality</title>
  </head>
  <body>
    <?php require('./partial/navbar.php');  
     if($inserted)
     {
       echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are Register successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
     }
     if($error)
     {
       echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$error.'.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
     }
    ?>

    <div class="container">

    <h2>Register Here</h2>

    <form action="/Piyush/signup.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username">
   
</div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>