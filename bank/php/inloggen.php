<?php


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "batbank";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>
