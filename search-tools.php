<?php

include_once(dirname(__FILE__) . '/config/dbconnect.php');

$text = $_POST['search'];

$sql = 
"SELECT tools.id as tid, tools.name as tname, tools.producer as tproducer, tools.model as tmodel , tools.factory_number as fnr, tools.ewidence_number as enr, tools_owner.owner as towner, is_broken as tbroken
FROM tools
LEFT OUTER JOIN tools_owner ON tools_owner.id=tools.owner_id
WHERE tools.name like '%{$text}%' OR tools.producer like '%{$text}%' OR tools.model like '%{$text}%' OR tools.factory_number like '%{$text}%' OR tools.ewidence_number like '%{$text}%'";

if ($result = $conn -> query($sql)) {
  echo "<table class='table table-striped'>";
    echo "<thead class='table-stripped' style='background-color: #343a40; color: #FFFAFA;'>";
      echo "<tr>";
        echo "<th scope='col'></th>";
        echo "<th scope='col'>Lp.</th>";
        echo "<th scope='col'>Nazwa</th>";
        echo "<th scope='col'>Producent</th>";
        echo "<th scope='col'>Model</th>";
        echo "<th scope='col'>Nr. fabryczny</th>";
        echo "<th scope='col'>Nr. ewidencyjny</th>";
        echo "<th scope='col'>Właściciel</th>";
        echo "<th scope='col'>Zepsute</th>";
        echo "<th scope='col'></th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td><input type='checkbox' data-table-name='tools' data-tools-id='".$row['tid']."'"."/></td>";
                echo "<td>" . $row['tid'] . "</td>";
                echo "<td>" . $row['tname'] . "</td>";
                echo "<td>" . $row['tproducer'] . "</td>";
                echo "<td>" . $row['tmodel'] . "</td>";
                echo "<td>" . $row['fnr'] . "</td>";
                echo "<td>" . $row['enr'] . "</td>";
                echo "<td>" . $row['towner'] . "</td>";
                if($row['tbroken'] == 1){
                  echo "<td>" . "Zepsute<a href='./modals/image-tools.php?p=".$row['tid']."'><i style='color: #50959E;' class='fas fa-images broken'></i></a>" . "</td>";
                 }
                 else{
                  echo "<td>" . "-" . "</td>";
                 }
                 if($row['tbroken'] == 0){
                 echo "<td><a href='./modals/broken-tools.php?broken-id=".$row['tid']."'><i style='color: #D64550;' class='fas fa-minus-square'></i></a></td>";
                 }
                 else{
                 echo "<td><a href='./modals/broken-tools.php?broken-id=".$row['tid']."'><i style='color: #96C0B7;' class='fas fa-check-square'></i></a></td>";
                 }
            echo "</tr>";
        }
        echo "</tbody>";
      echo "</table>";
    $result -> free_result();
  }
  $conn -> close();

?>