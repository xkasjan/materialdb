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
    <input type="text" class="form-control" id="name" name="tname" aria-describedby="name">
  </div>

  <div class="form-group">
    <label for="producer">Producent</label>
    <input type="text" class="form-control" id="producer" name="tproducer">
  </div>

  <div class="form-group">
    <label for="model">Model</label>
    <input type="text" class="form-control" id="model" name="tmodel">
  </div>

  <div class="form-group">
    <label for="sn">Numer seryjny</label>
    <input type="text" class="form-control" id="sn" name="tsn">
  </div>

  <div class="form-group">
    <label for="ewn">Numer ewidencyjny</label>
    <input type="text" class="form-control" id="ewn" name="tewn">
  </div>

  <label for="owner">Właściciel</label>
        <select class="custom-select" id="owner" name="towner">
            <option selected value="zero">Bez zmian</option>
            <option value="null">Brak</option>
                <?php 
                    $sql = "SELECT id as tid, owner as owner FROM `tools_owner`";
                    if ($result = $conn -> query($sql)) {
                        while($row = mysqli_fetch_array($result))
                            echo '<option value="'.$row['tid'].'">'.$row['owner'].'</option>';
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
    $data = array($_POST['tname'], $_POST['tproducer'], $_POST['tmodel'], $_POST['tsn'], $_POST['tewn']);
 
    $columns = array('name', 'producer', 'model', 'factory_number', 'ewidence_number');
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
    


    if(is_numeric($_POST['towner'])){
      if(is_numeric($_POST['towner']) && $emptyCount == 5){
        $townerNumber =(int)$_POST['towner'];
        $text =  'owner_id=' . $townerNumber;
      }
      else{
        $townerNumber =(int)$_POST['towner'];
        $text = $text . ", owner_id=" . $townerNumber;
      }
    }
    else if($_POST['towner'] == "null" && $emptyCount != 5){
       $text = $text . ", owner_id=NULL";
    }
    else if($_POST['towner'] == "zero"){
      $text = $text;
    }
    else if($_POST['towner'] == "null" && $emptyCount == 5){
      $text = "owner_id=NULL";
    }

    if($valueCheck){
      $values = implode(",", $values);
      $query  =  "UPDATE tools SET $text WHERE id IN ($values)";

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