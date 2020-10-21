<?php 

include_once('../config/dbconnect.php');
include_once('../config/bootstrap.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{


    

    if (!isset($_POST['mname']) ||!isset($_POST['mname-sn']) || !isset($_POST['mname-ewidence']) )
    {
        echo '<h1 class="display">' . "Niektóre pola muszą zostać wypełnione" . '</h1>';
    } else {

        if($_POST['mname-owner'] == 0) {
            $_POST['mname-owner'] = null;
        }
            

            $stmt = $conn->prepare("INSERT INTO machines (name, serial_number, ewidence_number, owner) VALUES (?, ?, ?, ?)");

            $stmt->bind_param("sssi",$_POST['mname'] , $_POST['mname-sn'], $_POST['mname-ewidence'], $_POST['mname-owner']);
    
            if(!$stmt->execute()){trigger_error("there was an error....".$conn->error, E_USER_WARNING);}
            
            $stmt->close();
        
            header("Location: ../index.php");
    }
}

?>