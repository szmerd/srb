<?php
 if(isset($_POST['update'])) {
    $tytul = $_POST['tytul'];
    $klient = $_POST['klient'];
    $miejsce = $_POST['miejsce'];
    $update = "UPDATE rezerwacje SET id_seans = '$tytul', id_klient = '$klient', numer = '$miejsce' WHERE id = '$rezid'" ;
            mysql_select_db('test_db');
            $retval = mysql_query( $update, $connection );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Pozycja została zaktualizowana\n";
}
else{
    $rezid = $_GET['rezID'];
$sql = "SELECT R.id as rezID, K.login as klient, F.tytul as tytul, S.data as data, R.numer as miejsce FROM rezerwacje as R JOIN seans as S ON R.id_seans = S.id JOIN klienci as K ON R.id_klient = K.id JOIN filmy as F ON S.id_film = F.id WHERE R.id = $rezid";
$result = mysql_query($sql);

	echo "<form name='update' method='post' action='$_PHP_SELF'>";
     echo "<table>
      <tr>
        <th>Tytul</th>
        <th>Klient</th>
        <th>Miejsce</th>
        <th>Data</th>
        <th>Edycja</th>
      </tr>";
    while($row = mysql_fetch_array($result)) { ?>

                     
                        <td><input name = "tytul" type = "text" 
                           id = "tytul" value="<?php echo $row['tytul'];?>"></td>
                     
                        <td><input name = "kleint" type = "text" 
                           id = "kleint" value="<?php echo $row['klient'];?>""></td>
                    
                         <td><input name = "miejsce" type = "text" 
                           id = "miejsce" value="<?php echo $row['miejsce'];?>""></td>
                    
                        <td><input name = "data" type = "text" 
                             id = "data" value="<?php echo $row['data'];?>""></td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>


    <?php }
    echo "</table></form>"; }

$connection->close();
?>