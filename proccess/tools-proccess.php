<?php 

include_once('../config/dbconnect.php');
include_once('../config/bootstrap.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{


    

    if (!isset($_POST['tmodel']) ||!isset($_POST['tproducer']) || !isset($_POST['tsn']) || !isset($_POST['tname']) || !isset($_POST['tewn']) )
    {
        echo '<h1 class="display">' . "Niektóre pola muszą zostać wypełnione" . '</h1>';
    } else {

        if($_POST['toolsowner'] == 0) {
            $_POST['toolsowner'] = null;
        }

            
            
            $stmt = $conn->prepare("INSERT INTO tools (name, producer, model, factory_number, ewidence_number, owner_id) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("sssssi", $_POST['tname'], $_POST['tproducer'] , $_POST['tmodel'], $_POST['tsn'], $_POST['tewn'], $_POST['toolsowner']);
    
            if(!$stmt->execute()){trigger_error("there was an error....".$conn->error, E_USER_WARNING);}
            
            $stmt->close();
        
            header("Location: ../index.php");
            
    }
}

?>