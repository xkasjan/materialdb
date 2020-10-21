<?php

include_once(dirname(__FILE__) . '/config/dbconnect.php');

$sql = 
"SELECT machines.id as mid, machines.name as mname, machines.serial_number as snr, machines.ewidence_number as enr, machines_owner.name as mowner
FROM machines 
LEFT OUTER JOIN machines_owner ON machines.id=machines_owner.id
WHERE machines.is_broken = 0;
";

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
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td><input type='checkbox' name='machines[]' value='" . $row['mid'] . "'". "/></td>";
                echo "<td>" . $row['mid'] . "</td>";
                echo "<td>" . $row['mname'] . "</td>";
                echo "<td>" . $row['snr'] . "</td>";
                echo "<td>" . $row['enr'] . "</td>";
                echo "<td>" . $row['mowner'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
      echo "</table>";
    $result -> free_result();
  }
  $conn -> close();
?>