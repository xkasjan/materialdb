<?php 

include_once('../config/dbconnect.php');
include_once('../config/bootstrap.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if (!isset($_POST['pname']) ||!isset($_POST['psymbol']))
    {
        echo '<h1 class="display">' . "Niektóre pola muszą zostać wypełnione" . '</h1>';
    } else {

        if($_POST['pmagazin'] == 0) {
            $_POST['pmagazin'] = null;
        }

        if($_POST['pkontrakt'] == 0) {
            $_POST['pkontrakt'] = null;
        }
        
            $stmt = $conn->prepare("INSERT INTO rusztowania (name, symbol, warehouse_id, contract_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii",$_POST['pname'] , $_POST['psymbol'], $_POST['pmagazin'], $_POST['pcontract']);


           if(!$stmt->execute()){trigger_error("there was an error....".$conn->error, E_USER_WARNING);}
            
            $stmt->close();
        
            header("Location: ../index.php");
    }
}

?>