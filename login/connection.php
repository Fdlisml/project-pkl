<?php 

$host = "localhost";
$user = "root";
$password = "";
$db = "db_project-pkl";
   
$conn = new mysqli($host,$user,$password,$db)or die("Connection Failed" . $conn->connect_error);

?>