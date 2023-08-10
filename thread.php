
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$inserted=false;
require('dbConnection.php');
$method=$_SERVER["REQUEST_METHOD"];
if($method=='POST')
{
  $th_comment=$_POST['comment'];
 
  $th_id=$_GET['threadid'];
  $user_id=$_POST['sno'];
  
  $sql = "INSERT INTO comments (comment_content,thread_id,comment_by)
  VALUES ('$th_comment','$th_id','$user_id')";
  
  if ($conn->query($sql) === TRUE) {
    $inserted=true;
    
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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

    <title>Welcome to Coding forum</title>
  </head>
  <body>
  <?php 
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  

  
  $id=$_GET['threadid'];
  //echo $id;
  require('partial/navbar.php') ;
  if($inserted)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your comment added successfuly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }

require('dbConnection.php');


$sql = "SELECT thread_id, thread_title, thread_desc, thread_id FROM threads WHERE thread_id='$id'";
  $result = $conn->query($sql);
  $check=true;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    $check=false;
    echo '<div class="jumbotron">
  <h1 class="display-4">'.$row['thread_title'].'</h1>
  <p class="lead"> '.$row['thread_desc'].'.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
   created by Piyush
  </p>
</div>';

  }
} 



 

?>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
    echo '<div class="container">
    <h1 class="text-center">Comments</h1>
    <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
    
    
    <div class="form-group">
      <label for="tprob">Post a comment</label>
      <textarea class="form-control" id="comment"name="comment" rows="3"></textarea>
    </div>
    <input type="hidden" name="sno" value="'.$_SESSION['user_id'].'">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>';
}else
{
    echo '<div class="container">
  <h1 class="text-center">Comment</h1>
  <p class="lead">You are not logged in to start comment </p>
  </div>';
}


?>


<div class="container">
  <h1 >Discussion</h1>
  <?php
  $sql = "SELECT comment_content,comment_time,comment_by FROM comments WHERE thread_id='$id'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     

        $comment_by=$row['comment_by'];
      $sql2 = "SELECT user_email FROM users WHERE sno='$comment_by'";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
  
  echo '<div class="media">
  <img class="mr-3" src="..." alt="Generic placeholder image">
  <div class="media-body">
  <p class="fs-3 my-0">'.$row2['user_email'].'at time '.$row['comment_time'].'</p>
    <h5 class="mt-0">'.$row['comment_content'].'</a></h5>
    
  </div>
</div>';
}

}else {
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">No Question</h1>
      <p class="lead"> You can ask firts.</p>
    </div>
  </div>';
  }
?>


</div>

<?php require('partial/footer.php')?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>