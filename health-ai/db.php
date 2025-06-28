<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbName = "ai";

$conn = new mysqli($host, $username, $password, $dbName);

if($conn->connect_error) {
    exit("Connection failed " . $conn->connect_error);
}
?>