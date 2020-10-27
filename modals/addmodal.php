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
          <h4 class="modal-title">Dodaj element do bazy danych</h4>
        </div>
        <div class="modal-body">

         
       



    

    <div>
  <ul class="nav nav-tabs nav-justified">
    <li class="active"><a href="#home">Rusztowanie</a></li>
    <li><a href="#menu4">Narzędzia</a></li>
    <li><a href="#menu5">Maszyny</a></li>
    <li><a href="#menu1">Magazyn</a></li>
    <li><a href="#menu2">Kontrakt</a></li>
    <li><a href="#menu3">Właściciel</a></li>
  </ul>

  <div class="tab-content">

  <div id="menu5" class="tab-pane fade in">
      



      <!-- Add -->
    <form action="../proccess/machine-proccess.php" method="POST">

  <div class="form-group" style="padding-top: 10px;">
    <label for="nazwa">Nazwa maszyny</label>
    <input type="text" name="mname" class="form-control" id="nazwa" aria-describedby="" placeholder="">
  </div>



  <div class="form-group">
    <label for="serial">Nr. seryjny</label>
    <input type="text" name="mname-sn" class="form-control" id="serial" placeholder="">
  </div>



  <div class="form-group">
  <label for="ewidence">Nr. ewidencyjny</label>
  <input type="text" name="mname-ewidence" class="form-control" id="ewidence" placeholder="">
  </div>

  <div class="form-group">
    <label for="owner">Właściciel</label>
    <select class="custom-select" id="owner" name="mname-owner">
    <option selected value="0">Brak</option>
    <?php 
  
   $sql = "SELECT id as oid, name as oname FROM `machines_owner`";
  if ($result = $conn -> query($sql)) {
    while($row = mysqli_fetch_array($result))
        echo '<option value="'.$row['oid'].'">'.$row['oname'].'</option>';
     $result -> free_result();
    }
    ?>
</select>
  </div>
    <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Submit</button>
    </form>
     </div>










  <div id="menu4" class="tab-pane fade in">
      

      <!-- Add -->
    <form action="../proccess/tools-proccess.php" method="POST">

    <div class="form-group" style="padding-top: 10px;">
    <label for="tnazwa">Nazwa</label>
    <input type="text" class="form-control" name="tname" id="tnazwa" aria-describedby="" placeholder="">
  </div>

  <div class="form-group" style="padding-top: 10px;">
    <label for="tmodel">Model</label>
    <input type="text" class="form-control" name="tmodel" id="tmodel" aria-describedby="" placeholder="">
  </div>



  <div class="form-group">
    <label for="producer">Producent</label>
    <input type="text" class="form-control" name="tproducer" id="producer" placeholder="">
  </div>



  <div class="form-group">
    <label for="fabrik">Nr. fabryczny</label>
    <input type="text" class="form-control" name="tsn" id="fabrik" placeholder="">
  </div>

  <div class="form-group">
    <label for="tewidence">Nr. ewidencyjny</label>
    <input type="text" class="form-control" name="tewn" id="tewidence" placeholder="">
  </div>


  <div class="form-group">
    <label for="owner">Właściciel</label>
    <select class="custom-select" id="owner" name="toolsowner">
    <option selected value="0">Brak</option>
    <?php 
   $sql = "SELECT id as tid, owner as towner FROM `tools_owner`";
  if ($result = $conn -> query($sql)) {
    while($row = mysqli_fetch_array($result))
        echo '<option value="'.$row['tid'].'">'.$row['towner'].'</option>';
     $result -> free_result();
    }
    ?>
</select>
  </div>


    <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Submit</button>
    </form>
      





    </div>


    <div id="home" class="tab-pane fade in active">
      

      <!-- Add -->
    <form action="../proccess/product-proccess.php" method="POST">

  <div class="form-group" style="padding-top: 10px;">
    <label for="nazwa">Nazwa produktu</label>
    <input type="text" class="form-control" name="pname" id="nazwa" aria-describedby="emailHelp" placeholder="">
  </div>



  <div class="form-group">
    <label for="symbol">Symbol</label>
    <input type="text" class="form-control" name="psymbol" id="symbol" placeholder="">
  </div>



  <div class="form-group">
  <label for="magazyn">Kontrakt</label>
  <select class="custom-select" id="magazyn" name="pmagazin">
  <option selected value="0">Brak</option>
  <?php 
  
   $sql = "SELECT id as cid, cname as cname FROM contracts;";
  if ($result = $conn -> query($sql)) {
    while($row = mysqli_fetch_array($result))
        echo '<option value="'.$row['cid'].'">'.$row['cname'].'</option>';
     $result -> free_result();
    }
    ?>
</select>
  </div>

  <div class="form-group">
    <label for="kontrakt">Magazyn</label>
    <select class="custom-select" id="kontrakt" name="pkontrakt">
    <option selected value="0">Brak</option>
    <?php 
   $sql = "SELECT id as wid, wname as warname FROM warehouse;";
    if ($result = $conn -> query($sql)) {
    while($row = mysqli_fetch_array($result))
        echo '<option value="'.$row['wid'].'">'.$row['warname'].'</option>';
     $result -> free_result();
    }
    ?>
    </select>
  </div>
 
    <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Submit</button>
    </form>
    
    </div>







    <div id="menu1" class="tab-pane fade">
      
    <form action="../proccess/warehouse-proccess.php" method="POST">
  <div class="form-group" style="padding-top: 10px;">
    <label for="mname">Nazwa magazynu</label>
    <input type="text" class="form-control" id="mname" name="warehouse" aria-describedby="" placeholder="">
  </div>
    <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Submit</button>
</form>
    </div>

    <div id="menu2" class="tab-pane fade">
      
      <form action="../proccess/contract-proccess.php" method="POST">
    <div class="form-group" style="padding-top: 10px;">
      <label for="contract-name">Nazwa kontraktu</label>
      <input type="text" name="contract-name" class="form-control" id="contract-name" aria-describedby="" placeholder="">
    </div>
      <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Submit</button>
  </form>
      </div>






    <div id="menu3" class="tab-pane fade">
      
    <form action="../proccess/owner-proccess.php" method="POST">
  <div class="form-group" style="padding-top: 10px;">
    <label for="owner">Nazwa właściciela</label>
    <input type="text" name="nowner" class="form-control" id="owner" aria-describedby="" placeholder="">
  
  </div>
    <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Submit</button>
</form>

    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
</script>


<?php $conn -> close(); ?>

        <div class="modal-footer">
          
          <script>
            function redirect(){
               window.location.href = "../index.php";
            }
          </script>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>