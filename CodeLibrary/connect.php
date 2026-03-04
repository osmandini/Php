<?php

// this connects To database
$hostname="localhost";    
$username="odini01";   
$password="Nscc240!@#";    
$dbname="odini01";    

$conn = new mysqli($hostname, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "You are Connected!!";



?>
