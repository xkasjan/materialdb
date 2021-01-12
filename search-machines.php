<?php

include_once(dirname(__FILE__) . '/config/dbconnect.php');

$text = $_POST['search'];

$sql = 
"SELECT machines.id as mid, machines.name as mname, machines.serial_number as snr, machines.ewidence_number as enr, machines_owner.name as mowner
FROM machines 
LEFT OUTER JOIN machines_owner ON machines.id=machines_owner.id
WHERE machines.name like '%{$text}%' OR machines.serial_number like '%{$text}%' OR machines.ewidence_number like '%{$text}%'";

if ($result = $conn -> query($sql)) {
  echo "<table class='table table-striped'>";
    echo "<thead class='table-stripped' style='background-color: #343a40; color: #FFFAFA;'>";
      echo "<tr>";
        echo "<th scope='col'></th>";
        echo "<th scope='col'>Lp.</th>";
        echo "<th scope='col'>Nazwa</th>";
        echo "<th scope='col'>Nr. seryjny</th>";
        echo "<th scope='col'>Nr. ewidencyjny</th>";
        echo "<th scope='col'>Właściciel</th>";
        echo "<th scope='col'></th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td><input type='checkbox' data-table-name='machines' data-machine-id='".$row['mid']."'"."/></td>";
                echo "<td>" . $row['mid'] . "</td>";
                echo "<td>" . $row['mname'] . "</td>";
                echo "<td>" . $row['snr'] . "</td>";
                echo "<td>" . $row['enr'] . "</td>";
                echo "<td>" . $row['mowner'] . "</td>";
                if($row['tbroken'] == 1){
                  echo "<td>" . "Zepsute<a href='./modals/image-machines.php?p=".$row['mid']."'><i style='color: #50959E;' class='fas fa-images broken'></i></a>" . "</td>";
                 }
                 else{
                  echo "<td>" . "-" . "</td>";
                 }
                 if($row['tbroken'] == 0){
                 echo "<td><a href='./modals/broken-machines.php?broken-id=".$row['mid']."'><i style='color: #D64550;' class='fas fa-minus-square'></i></a></td>";
                 }
                 else{
                 echo "<td><a href='./modals/broken-machines.php?broken-id=".$row['mid']."'><i style='color: #96C0B7;' class='fas fa-check-square'></i></a></td>";
                 }
            echo "</tr>";
        }
        echo "</tbody>";
      echo "</table>";
    $result -> free_result();
  }
  $conn -> close();
?>