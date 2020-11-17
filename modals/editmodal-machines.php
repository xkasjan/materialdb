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
    <label for="mname">Nazwa</label>
    <input type="text" class="form-control" id="mname" name="mname" aria-describedby="name">
  </div>

  <div class="form-group">
    <label for="sn">Numer seryjny</label>
    <input type="text" class="form-control" id="sn" name="sn">
  </div>

  <div class="form-group">
    <label for="ewn">Number ewidencyjny</label>
    <input type="text" class="form-control" id="ewn" name="ewn">
  </div>

  <label for="mowner">Właściciel</label>
        <select class="custom-select" id="mowner" name="mowner">
            <option selected value="">Bez zmian</option>
            <option value="null">Brak</option>
                <?php 
                    $sql = "SELECT id as tid, name as mname FROM `machines_owner`";
                    if ($result = $conn -> query($sql)) {
                        while($row = mysqli_fetch_array($result))
                            echo '<option value="'.$row['tid'].'">'.$row['mname'].'</option>';
                            $result -> free_result();
                            }
                ?>
        </select><br /><br />
        
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
    $data = array(mysqli_real_escape_string($conn, htmlspecialchars($_POST['mname'])),
     mysqli_real_escape_string($conn, htmlspecialchars($_POST['sn'])),
     mysqli_real_escape_string($conn, htmlspecialchars($_POST['ewn'])));
 

    $columns = array('name', 'serial_number', 'ewidence_number');
    $text = "";
    $isArrayEmpty = false;
    $emptyCount = 0;

    for($z = 0; $z < 5; $z++){
        if(!empty($data[$z])){
            $text = $text . $columns[$z] . "='" . $data[$z] . "', ";
        }
        else{
        $emptyCount++;
        }
    }
    //$textLength = strlen($text);
    $text = substr($text, 0, -2);
    

    if ($_SERVER['REQUEST_METHOD']== "POST") {

        $ownerStatusCheck = false;

        if($_POST['mowner'] == ""){
          $ownerStatus = "";
        }
        else if($_POST['mowner'] == "null"){
          $ownerStatus = "owner=NULL";
          $ownerStatusCheck = true;
        }
        else if(is_numeric($_POST['mowner'])){
          $ownerStatus = "owner=" . $_POST['mowner'];
          $ownerStatusCheck = true;
        }

      if(!empty($text) && $ownerStatusCheck){
          $output = $text . ", " . $ownerStatus;
      }
      else if(!empty($text) && !$ownerStatusCheck){
          $output = $text;
      }
      else if(empty($text) && $ownerStatusCheck){
        $output = $ownerStatus;
      }else if(empty($text) && !$ownerStatusCheck){
        $output = "";
      }

      echo $output;
    /*
      if($valueCheck){
        $values = implode(",", $values);
        $query  =  "UPDATE rusztowania SET $output WHERE id IN ($values)";
  
        //echo($set);
        //echo($values);
      
        if(mysqli_query($conn, $query)){
            //header("Location: ../index.php");
        }
        else{
            //header("Location: ../index.php");
        }
        mysqli_close($conn);      
      }   
  */
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