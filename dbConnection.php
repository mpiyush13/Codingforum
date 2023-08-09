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
?>