<?php
include_once('../config/dbconnect.php');
header('Content-type: text/plain');

$productID = $_GET['broken-id'];
$zepsute = 1;
$niezepsute = 0;

$cat = 2;

$query = "SELECT is_broken as broken FROM tools WHERE id = '$productID'";
$result = mysqli_query($conn, $query);
$data = $result->fetch_assoc();

if($data['broken'] == "1"){
     $sqlq  = "UPDATE tools SET is_broken=? WHERE id=?";
        $stmt = $conn->prepare($sqlq);
        $stmt->bind_param("ii", $niezepsute, $productID);
        $stmt->execute();
        $stmt->close();


        // Pobieranie ilości zdjęć z bazy danych
        $sqlCount = "SELECT COUNT(*) as c FROM images WHERE category=? AND item_id=?";
        $stmt2 = $conn->prepare($sqlCount);
        $stmt2->bind_param("ii", $cat, $productID);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $data = $result->fetch_array(MYSQLI_ASSOC); // <-- INT Count $data
        $stmt2->close();
        
        // Usuwanie zdjęć
        $filename = $productID . "-2" . "-";
        $ext = ".jpg";
        $path = "../gallery/tools/";
        $path2 = "materialdb/gallery/tools/";

        for($x = 1; $x <= $data['c']; $x++){    
            $file = $path . $filename . $x . $ext;
            $fileToDelete = $path2 . $filename . $x . $ext;
            
            if (file_exists($file)) {
                // usuwanie zdjec z bazy danych
                
                $sqlDeleteImages = "DELETE FROM images WHERE item_id=? AND category=? AND image=?";
                $stmt3 = $conn->prepare($sqlDeleteImages);
                $stmt3->bind_param("iis", $productID, $cat, $file);
                $stmt3->execute();
                $stmt3->close();
                
                unlink($file);
              }
              
        }

        
    header("Location: ../index.php");
}
else if($data['broken'] == "0"){
    $sqlq  = "UPDATE tools SET is_broken=? WHERE id=?";
        $stmt = $conn->prepare($sqlq);
        $stmt->bind_param("ii", $zepsute, $productID);
        $stmt->execute();
        $stmt->close();      
    header("Location: ../index.php");
}
else{
    echo "error";
}

?>