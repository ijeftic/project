<?php

$mysqli = mysqli_connect("localhost", "root", "", "test", 3306);
 
// Check connection
if($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

