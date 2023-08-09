
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
  <?php require('partial/navbar.php') ?>

    <div class="container my-2">
        <h1 class="text-center"> Coding Forum</h1>
        <div class="row">
         <?php

       

          $sql = "SELECT * FROM cotegory";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id=$row["cotegory_id"];
                echo '<div class="col-md-4">
                <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/Piyush/threadlist.php?id='.$id.'">'.$row["cotegory_name"].'</a></h5>
                            <p class="card-text">'.substr($row["cotegory_description"],0,10).'.....</p>
                            <a href="/Piyush/threadlist.php?id='.$id.'" class="btn btn-primary">View Thread</a>
                        </div>
                </div>
            </div> ';


             
            }
          } 
          else {
            echo "0 results";
          }
          $conn->close();
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