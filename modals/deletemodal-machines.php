<?php
include_once('../config/dbconnect.php');
/*
$mid=$_GET['did'];
$mname=$_GET['rname'];
$msn=$_GET['sn'];
$men=$_GET['en'];
$mown=$_GET['own'];
*/

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
<script src="../scripts/modalScripts.js"></script>
<script>
var machineArray = [];
var machineCount = 0;

machineArray = localStorage.getItem("machineID");
machineCount = localStorage.getItem("machineCount");

//console.log(machineCount);
</script>



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
          <button type="button" class="close" data-dismiss="modal" onclick="redirect()">&times;</button>
          <h4 class="modal-title">Czy chcesz usunąć ten produkt?</h4>
        </div>
        <div class="modal-body">
          

          <?php

            $machineTest = $_GET['test'];
            $machineID = explode(",",$machineTest);
            //$machineID = filter_var($machineID, FILTER_SANITIZE_NUMBER_INT);
            print_r ($machineID);        
            $machineCount = count($machineID);
            echo $machineCount;
            //echo $machineTest;
          
            if($machineCount > 0)
            {
              
            }

        
          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="">Close</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirect()">Close</button>
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