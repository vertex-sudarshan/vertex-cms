<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ambiencecare";

    if(!isset($_SESSION)) 
    { 
        @session_start(); 
    } 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
?>