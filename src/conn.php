<?php
$servername = "100.100.55.20";
$username = "root"; 
$password = "123"; 
$dbname = "db_crud"; 
$port = 13307; 

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 
echo "";
?>
