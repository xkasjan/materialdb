<?php
$srvname = "localhost";
$usrname = "root";
$pwd = "";
$dbname = "materialdb";

$conn = new mysqli($srvname, $usrname, $pwd, $dbname);

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }

?>