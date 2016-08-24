<?php
$sql = "SELECT filmy.id as filmID, tytul, rezyser, gatunek.nazwa as gatunek FROM filmy JOIN gatunek ON filmy.gatunek = gatunek.id";
$result = mysql_query($sql);

	echo "<table>
  <tr>
    <th>Tytul</th>
    <th>Reżyser</th>
    <th>Gatunek</th>
    <th>Edycja</th>
  </tr>";
    while($row = mysql_fetch_array($result)) {
        echo "<tr>
        <td>".$row['tytul']."</td>
        <td>".$row['rezyser']."</td>
        <td>".$row['gatunek']."</td>
        <td><a href='?filmid=".$row['filmID']."'>[edytuj]</a></td>
        </tr>";
    }
    echo "</table>";

$connection->close();
?>