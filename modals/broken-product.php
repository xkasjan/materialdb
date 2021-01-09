<?php
include_once('../config/dbconnect.php');

$productID = $_GET['broken-id'];
$zepsute = 1;
$niezepsute = 0;

//$result = mysqli_query($conn, "SELECT is_broken as broken FROM rusztowania WHERE id = '($productID)'");
$query = "SELECT is_broken as broken FROM rusztowania WHERE id = '$productID'";
$result = mysqli_query($conn, $query);
$data = $result->fetch_assoc();

//echo($data['broken']);
//var_dump($data['broken']);

if($data['broken'] == "1"){
     $sqlq  = "UPDATE rusztowania SET is_broken=? WHERE id=?";
        $stmt = $conn->prepare($sqlq);
        $stmt->bind_param("ii", $niezepsute, $productID);
        $stmt->execute();
        $stmt->close();

        
     header("Location: ../index.php");
}
else if($data['broken'] == "0"){
    $sqlq  = "UPDATE rusztowania SET is_broken=? WHERE id=?";
        $stmt = $conn->prepare($sqlq);
        $stmt->bind_param("ii", $zepsute, $productID);
        $stmt->execute();
        $stmt->close();      
     header("Location: ../index.php");
}
else{
    echo "error";
}

?>