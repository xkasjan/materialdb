<?php
include_once('../config/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onClick="redirect()">&times;</button>
          <h4 class="modal-title">Edytowanie rekordów</h4>
          <small style="color: #84828F;">Dane zmienią się tylko i wyłącznie gdy podamy nową zawartość w polu poniżej. Pola puste zostaną pomienięte, a poprzednia wartość zostanie zachowana.</small>
        </div>
        <div class="modal-body">


<form method="POST" action="">

  <div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" id="name" name="pname" aria-describedby="name">
  </div>

  <div class="form-group">
    <label for="pamount">Ilość</label>
    <input type="number" class="form-control" id="amount" name="pamount" aria-describedby="amount" min="0" max="999999">
  </div>

  <div class="form-group">
    <label for="symbol">Symbol</label>
    <input type="text" class="form-control" id="symbol" name="psymbol">
  </div>

  <label for="magazyn">Magazyn</label>
        <select class="custom-select" id="magazyn" name="pmagazyn">
            <option selected value="">Bez zmian</option>
            <option value="NULL">Brak</option>
                <?php 
                    $sql = "SELECT id as wid, wname as wname FROM `warehouse`";
                    if ($result = $conn -> query($sql)) {
                        while($row = mysqli_fetch_array($result))
                            echo '<option value="'.$row['wid'].'">'.$row['wname'].'</option>';
                            $result -> free_result();
                            }
                ?>
        </select>
        <br /><br />

    <label for="contract">Kontrakt</label>
        <select class="custom-select" id="contract" name="pcontract">
            <option selected value="">Bez zmian</option>
            <option value="NULL">Brak</option>
                <?php 
                    $sql = "SELECT id as cid, cname as cname FROM `contracts`";
                    if ($result = $conn -> query($sql)) {
                        while($row = mysqli_fetch_array($result))
                            echo '<option value="'.$row['cid'].'">'.$row['cname'].'</option>';
                            $result -> free_result();
                            }
                ?>
        </select>
        <br /><br />
        
    <button type="submit" name="submitbutton" class="btn btn-primary">Edytuj</button>
</form>

<?php
$values = explode(",", $_GET["ids"]);


foreach($values as $v){
  if(!is_numeric($v)){
    $valueCheck = false;
  }
  else{
    $valueCheck = true;
  }
}


if(isset($_POST['submitbutton'])){
    
    
    

/*
    if($_POST['towner'] == "null"){
        $towner = "NULL";
    }
    else{
      $towner = $_POST['towner'];
      $towner = (int)$towner;
    }
    */
    $data = array(mysqli_real_escape_string($conn, htmlspecialchars($_POST['pname'])), mysqli_real_escape_string($conn, htmlspecialchars($_POST['psymbol'])));
 
    $columns = array('name', 'symbol');
    $text = "";
    $isArrayEmpty = false;
    $emptyCount = 0;
    $output = "";

    for($z = 0; $z < 2; $z++){
        if(!empty($data[$z])){
            $text = $text . $columns[$z] . "='" . $data[$z] . "', ";
        }
        else{
        $emptyCount++;
        }
    }

    
    $text = substr($text, 0, -2);
    //$text = htmlspecialchars($text);
    //var_dump($text);
    //echo $text;
    if ($_SERVER['REQUEST_METHOD']== "POST") {

      $amount = (int)$_POST['pamount'];
     
      if($amount != 0 && $text != ""){
        $text = $text . ",amount=" . $amount;
      }
      else if($amount != 0 && $text == ""){
        $text = "amount=" . $amount;
      }
      else if($amount = 0){
        $text = $text;
      }

      if($_POST['pmagazyn'] == ""){
        $magazynStatus = "";
      }
      else if($_POST['pmagazyn'] == "NULL"){
        $magazynStatus = "warehouse_id=NULL";
      }
      else if(is_numeric($_POST['pmagazyn'])){
        $magazynStatus = "warehouse_id=" . $_POST['pmagazyn'];
      }

      if($_POST['pcontract'] == ""){
        $contractStatus = "";
      }
      else if($_POST['pcontract'] == "NULL"){
        $contractStatus = "contract_id=NULL";
      }
      else if(is_numeric($_POST['pcontract'])){
        $contractStatus = "contract_id=" . $_POST['pcontract'];
      }

    
      if(!empty($text)){
        if(!empty($_POST['pcontract']) && !empty($_POST['pmagazyn'])){
          $output = $text . ", " . $contractStatus . ", " . $magazynStatus;
        }
        else if(empty($_POST['pcontract']) && !empty($_POST['pmagazyn'])){
          $output = $text . ", " . $magazynStatus;
        }
        else if(!empty($_POST['pcontract']) && empty($_POST['pmagazyn'])){
          $output = $text . ", " . $contractStatus;
        }
        else if(empty($_POST['pcontract']) && empty($_POST['pmagazyn'])){
          $output = $text;
        }
      }
      else{
        if(!empty($_POST['pcontract']) && !empty($_POST['pmagazyn'])){
          $output = $contractStatus . ", " . $magazynStatus;
        }
        else if(empty($_POST['pcontract']) && !empty($_POST['pmagazyn'])){
          $output = $magazynStatus;
        }
        else if(!empty($_POST['pcontract']) && empty($_POST['pmagazyn'])){
          $output = $contractStatus;
        }
        else if(empty($_POST['pcontract']) && empty($_POST['pmagazyn'])){
          $output = $text;
        }
        else{
          $output = "";
        }    
      }


    if($valueCheck){
      
      $values = implode(",", $values);
      $query  =  "UPDATE rusztowania SET $output WHERE id IN ($values)";

      //echo($set);
      //echo($values);
    
      if(mysqli_query($conn, $query)){
          header("Location: ../index.php");
      }
      else{
          header("Location: ../index.php");
      }
      
      mysqli_close($conn);      
    }   

}

}  

?>
          <script>
            function redirect(){
                window.location.href="../index.php";
            }
        </script>
      </div> 
    </div>
  </div>
  
</div>

</body>
</html>