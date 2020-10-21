<?php

class mainQuery {

function mainDatabase(){
global $conn;

$sql = 
"SELECT r.id as rid, r.name as rname, r.symbol as symbol, w.nazwa as nazwa, c.name as cname, r.is_broken as broken FROM rusztowania as r
INNER JOIN warehouse as w ON r.id=w.id
INNER JOIN contracts as c ON c.id=r.id
WHERE r.is_broken = 0";

if ($result = $conn -> query($sql)) {
    echo "<table class='table table-striped'>";
        echo '<thead>';
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Nazwa</th>";
                echo "<th>Symbol</th>";
                echo "<th>Magazyn</th>";
                echo "<th>Kontrakt</th>";
                echo "<th>czyUszkodzone</th>";
            echo "</tr>";
            echo '<thead>';
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['rid'] . "</td>";
                echo "<td>" . $row['rname'] . "</td>";
                echo "<td>" . $row['symbol'] . "</td>";
                echo "<td>" . $row['nazwa'] . "</td>";
                echo "<td>" . $row['cname'] . "</td>";
                echo "<td>" . $row['broken'] . "</td>";
            echo "</tr>";

        
        }
        echo "</table>";


  

    $result -> free_result();
  }
  $conn -> close();




}
}
?>