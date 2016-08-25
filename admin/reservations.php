<?php
$sql = "SELECT R.id as rezID, K.login as klient, F.tytul as tytul, S.data as data, R.numer as miejsce FROM rezerwacje as R JOIN seans as S ON R.id_seans = S.id JOIN klienci as K ON R.id_klient = K.id JOIN filmy as F ON S.id_film = F.id";
$result = mysql_query($sql);

	echo "<table>
  <tr>
    <th>Tytul</th>
    <th>Klient</th>
    <th>Miejsce</th>
    <th>Data</th>
  </tr>";
    while($row = mysql_fetch_array($result)) {
        echo "<tr>
        <td>".$row['tytul']."</td>
        <td>".$row['klient']."</td>
        <td>".$row['miejsce']."</td>
        <td>".$row['data']."</td>
        <td><a href='?rezID=".$row['rezID']."'>[edytuj]</a></td>
        </tr>";
    }
    echo "</table>";

$connection->close();
?>