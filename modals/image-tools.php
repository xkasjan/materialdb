<?php

include_once('../config/dbconnect.php');

$imageID = $_GET['p'];
$category = 2;
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="redirect()">&times;</button>
        
          <form action="" method="post" enctype="multipart/form-data">
          <label>Wybierz zdjęcie:</label>
          <input type="file" name="img" ><br />
          <input type="submit" class="btn btn-primary" name="submit" value="Dodaj">
          </form>

          <?php
    // If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 

  if(!empty($_FILES["img"]["name"])) { 

    $sqlCount = mysqli_query($conn, "SELECT count(1) as total FROM images WHERE category='$category' AND item_id='$imageID' ORDER BY uploaded DESC");
    $data=mysqli_fetch_assoc($sqlCount);

  
              $rowTotal = $data['total'];

              // Add 1 to uploaded image
              $newID = $rowTotal + 1;
              // Complete name of new

    $name = $imageID . "-" . $category . "-" . $newID .  ".jpg";
    $target_dir = "../gallery/tools/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $image = $target_dir . $name;
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

       // Insert record
      $query = "insert into images(item_id, category, image, name, uploaded) values('$imageID', '$category', '$image' ,'$name', NOW());";
      mysqli_query($conn,$query);
      
       // Upload file
       move_uploaded_file($_FILES['img']['tmp_name'],$target_dir.$name);
  
    }


  }
}

  ?>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
        <div class="row text-center text-lg-left">
      <?php 
                   
// Get image data from database 
$sql = "SELECT image as img, name as nm FROM images WHERE category=? AND item_id=? ORDER BY uploaded DESC";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ii", $category, $imageID);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

?>
<?php if($result->num_rows > 0){ ?> 
        <?php while($row = $result->fetch_assoc()){ ?> 
          <div class="col-12">
          <a target="_blank" href="<?php echo $row['img'] ?>" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="<?php echo $row['img'] ?>" alt=""/> 
          </div> 
            
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Brak zdjęć...</p> 
<?php } ?> 


</div>
</div>
      </div>
    </div>

  </div>
</div>

</div>

<script>
            function redirect(){
               window.location.href = "../index.php";
            }


          </script>
</body>
</html>