<?php

$host = 'localhost';
$username = 'root';
$database = 'hcrs';
$password = '';

$con = mysqli_connect($host, $username, $password, $database);
if(!$con){
    die("Failed to connect to database!");
}

?>