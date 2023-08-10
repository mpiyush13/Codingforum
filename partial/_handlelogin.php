<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$login=false;
$error=false;
// require('dbConnection.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    // echo "connected with databes";
    require('../dbConnection.php');
   $username=$_POST['username'];
   $password=$_POST['password'];



   $sql = "SELECT sno, user_email, user_pass FROM users WHERE user_email='$username'";
   $result = $conn->query($sql);
   
   if ($result->num_rows==1) {

    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
     if(password_verify($password,$row["user_pass"]))
     {
        $login=true;
        session_start();
     $_SESSION['username'] = $username;
     $_SESSION['loggedin'] = true;
     $_SESSION['user_id'] = $row['sno'];
     header("location:/Piyush/index.php"); 
     }else{
        $error="Invalid Credentials";
        header("location:/Piyush/index.php"); 
     }
    
    }
    
    

 }else{
    
    $error=true;
 }

}
?>