<?php

include_once(dirname(__FILE__) . '/config/dbconnect.php');

$sql = 
"SELECT tools.id as tid, tools.name as tname, tools.producer as tproducer, tools.factory_number as fnr, tools.ewidence_number as enr, tools_owner.owner as towner
FROM tools LEFT OUTER JOIN tools_owner ON tools.id=tools_owner.id;
";

if ($result = $conn -> query($sql)) {
  echo "<table class='table table-striped'>";
    echo "<thead class='table-stripped' style='background-color: #343a40; color: #FFFAFA;'>";
      echo "<tr>";
        echo "<th scope='col'>Lp.</th>";
        echo "<th scope='col'>Model</th>";
        echo "<th scope='col'>Producent</th>";
        echo "<th scope='col'>Nr. fabryczny</th>";
        echo "<th scope='col'>Nr. ewidencyjny</th>";
        echo "<th scope='col'>Właściciel</th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['tid'] . "</td>";
                echo "<td>" . $row['tname'] . "</td>";
                echo "<td>" . $row['tproducer'] . "</td>";
                echo "<td>" . $row['fnr'] . "</td>";
                echo "<td>" . $row['enr'] . "</td>";
                echo "<td>" . $row['towner'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
      echo "</table>";
    $result -> free_result();
  }
  $conn -> close();

?>