<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$error="false";
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
    require('../dbConnection.php');
    $username=$_POST['username'];
   $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if($password==$cpassword)
    {
   
 $sql = "SELECT sno, user_email, user_pass FROM users WHERE user_email='$username' ";
   $result = $conn->query($sql);
   
   if ($result->num_rows>0) {
    $error="User already exist";
    header('location:/Piyush/index.php?signup=false&error=false');

//     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//     <strong>Success!</strong> user alraedy exit.
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//   </div>';

   }else{

    $hash=password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user_email, user_pass)
VALUES ('$username', '$hash')";

if ($conn->query($sql) === TRUE) {
  $inserted=true;
  header('location:/Piyush/index.php?signup=true');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

   }
    }else
    {
        $error="Database insertion fail";
        header('location:/Piyush/index.php?signup=false&error=false');
    }


   
 

 }
?>