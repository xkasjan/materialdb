<?php

class chart {

  function contractsAmount(){

    $sql = "SELECT contracts.name, count(*) as 'amount'
    FROM rusztowania
    INNER JOIN contracts ON rusztowania.id=contracts.id
    GROUP BY contracts.name";

if ($result = $conn -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    echo $row[0]. " " . $row[1]. "<br />";
  }
  $result -> free_result();
}
}
}
?>