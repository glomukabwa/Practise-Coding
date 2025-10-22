<?php
$host = "localhost:3307";
$user = "root";
$password = "b@bad1ana";
$database = "test";

$conn = new mysqli($host, $user, $password, $database);
if($conn->connect_error){
    die("Connection failed:". $conn->connect_error);
}

?>