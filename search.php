
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
    <style>
  .container{
    min-height:100vh;
  }
        </style>
  </head>
  <body>
  <?php require('partial/navbar.php') ?>

   <div class="container my-3">
   <h1> Here is serch result for :<?php echo $_GET['search']; ?> </h1>
<div class="result">

   <?php
$id=$_GET["search"];
$sql = "
SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$id')";
  $result = $conn->query($sql);
  $check=true;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $thread_user_id=$row['thread_user_id'];
        
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    $check=false;
    echo '<div class="jumbotron">
  <h1 class="display-4"><a href="/Piyush/thread.php?threadid='.$row['thread_id'].'">'.$row['thread_title'].'<a></h1>
  <p class="lead"> '.$row['thread_desc'].'.</p>
  
</div>';

  }
}else
{
    echo '<div class="jumbotron">
  <h1 class="display-4">No result found</h1>
  <p class="lead"> I did not get any result.</p>
  
</div>';
}

?>
  
  
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