<?php
$srvname = "localhost";
$usrname = "root";
$pwd = "";
$dbname = "materialdb";

$conn = new mysqli($srvname, $usrname, $pwd, $dbname);

if ($conn->connect_error) {  
  die("Connection failed: " . $conn->connect_error);  
}
?>