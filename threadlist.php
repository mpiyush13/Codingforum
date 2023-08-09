
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('dbConnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome to Coding forum</title>
  </head>
  <body>
  <?php 
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  

  
  $id=$_GET['id'];
  require('partial/navbar.php') 
   ?>
  
  <?php

$servername = "localhost";
$username = "root";$password = "";
$dbname = "codingForum";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// echo "connevction fail to database";
if ($conn->connect_error) {
    echo "connevction fail to database";
die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT cotegory_id, cotegory_name, cotegory_description FROM cotegory WHERE cotegory_id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    $name=$row['cotegory_name'];
    echo '<div class="jumbotron">
  <h1 class="display-4">'.$row['cotegory_name'].'</h1>
  <p class="lead"> '.$row['cotegory_description'].'.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>';

  }
} else {
  echo "0 results";
}



 

?>
<div class="container">
  <h1>browjing question</h1>
  <div class="media">
  <img class="mr-3" src="..." alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">Media heading</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
  </div>
</div>


</div>

<?php require('partial/footer.php')?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>