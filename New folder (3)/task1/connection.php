<?php
$servername = "localhost";
$userame = "root";
$password = "";
$database = "form";

$conn = mysqli_connect($servername, $userame, $password,  $database );

if(!$conn){
    die("Sorry we failed to connect:" . mysqli_connect_error());
}


?>