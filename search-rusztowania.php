<?php

include_once('config/dbconnect.php');

    $text = $_POST['search'];

    $sql = "SELECT r.id as rid, r.name as rname, r.amount as ramount , r.symbol as symbol, w.wname as nazwa, c.cname as cname, r.is_broken as rbroken
    FROM rusztowania AS r 
    LEFT OUTER JOIN warehouse AS w ON r.warehouse_id=w.id 
    LEFT OUTER JOIN contracts AS c ON r.contract_id=c.id 
    WHERE r.name like '%{$text}%' OR r.symbol like '%{$text}%' OR r.amount like '%{$text}%' OR w.wname like '%{$text}%' OR c.cname like '%{$text}%'";


    if($result = $conn -> query($sql))
    {

        echo "<table class='table table-striped'>";
     echo "<thead class='table-stripped' style='background-color: #343a40; color: #FFFAFA;'>";
       echo "<tr>";
         echo "<th scope='col'></th>";
         echo "<th scope='col'>Lp.</th>";
         echo "<th scope='col'>Nazwa</th>";
         echo "<th scope='col'>Ilość</th>";
         echo "<th scope='col'>Symbol</th>";
         echo "<th scope='col'>Magazyn</th>";
         echo "<th scope='col'>Kontrakt</th>";
         echo "<th scope='col'>Stan</th>";
         echo "<th scope='col'></th>";
       echo "</tr>";
     echo "</thead>";
     echo "<tbody>";
         while($row = mysqli_fetch_array($result)){
           $czyzepsute = $row['rbroken'];
             echo "<tr>";
                 echo "<td><input type='checkbox' data-table-name='rusztowania' data-product-id='".$row['rid']."'"."/></td>";
                 echo "<td>" . $row['rid'] . "</td>";
                 echo "<td>" . $row['rname'] . "</td>";
                 echo "<td>" . $row['ramount'] . "</td>";
                 echo "<td>" . $row['symbol'] . "</td>";
                 echo "<td>" . $row['nazwa'] . "</td>";
                 echo "<td>" . $row['cname'] . "</td>";
                 if($row['rbroken'] == 1){
                  echo "<td>" . "Zepsute<a href='./modals/image-product.php?p=".$row['rid']."'><i style='color: #50959E;' class='fas fa-images broken'></i></a>" . "</td>";
                 }
                 else{
                  echo "<td>" . "-" . "</td>";
                 }
                 if($row['rbroken'] == 0){
                 echo "<td><a href='./modals/broken-product.php?broken-id=".$row['rid']."'><i style='color: #D64550;' class='fas fa-minus-square'></i></a></td>";
                 }
                 else{
                 echo "<td><a href='./modals/broken-product.php?broken-id=".$row['rid']."'><i style='color: #96C0B7;' class='fas fa-check-square'></i></a></td>";
                 }
                echo "</tr>";
         }
         echo "</tbody>";
       echo "</table>";
     $result -> free_result();

    }

?>