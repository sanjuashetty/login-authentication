<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'signupforms';

// Create connection
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>
