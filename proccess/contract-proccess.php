<?php 

include_once('../config/dbconnect.php');
include_once('../config/bootstrap.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if (!isset($_POST['contract-name']))
    {
        echo '<h1 class="display">' . "Niektóre pola muszą zostać wypełnione" . '</h1>';
    } else {

       
            $stmt = $conn->prepare("INSERT INTO contracts (cname) VALUES (?)");
            $stmt->bind_param("s",$_POST['contract-name']);


           if(!$stmt->execute()){trigger_error("there was an error....".$conn->error, E_USER_WARNING);}
            
            $stmt->close();
        
            header("Location: ../index.php");
    }
}

?>