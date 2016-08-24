<?php
 if(isset($_POST['update'])) {
    $tytul = $_POST['tytul'];
    $rezyser = $_POST['rezyser'];
    $gatunek = $_POST['gatunekID'];
    $update = "UPDATE filmy SET tytul = '$tytul', rezyser = '$rezyser', gatunek = '$gatunek' WHERE id = '$filmid'" ;
            mysql_select_db('test_db');
            $retval = mysql_query( $update, $connection );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Pozycja została zaktualizowana\n";
}
else{
    $filmid = $_GET['filmid'];
$sql = "SELECT filmy.id as filmID, tytul, rezyser, gatunek.nazwa as gatunek, filmy.gatunek as gatunekID FROM filmy JOIN gatunek ON filmy.gatunek = gatunek.id WHERE filmy.id = $filmid";
$result = mysql_query($sql);

	echo "<form name='update' method='post' action='$_PHP_SELF'>";
     echo "<table>
      <tr>
        <th>Tytul</th>
        <th>Reżyser</th>
        <th>Gatunek</th>
        <th>Edycja</th>
      </tr>";
    while($row = mysql_fetch_array($result)) { ?>

                     
                        <td><input name = "tytul" type = "text" 
                           id = "tytul" value="<?php echo $row['tytul'];?>"></td>
                     
                        <td><input name = "rezyser" type = "text" 
                           id = "rezyser" value="<?php echo $row['rezyser'];?>""></td>
                    
                         <td><input name = "gatunekID" type = "text" 
                           id = "gatunekID" value="<?php echo $row['gatunekID'];?>""></td>
                    
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>


    <?php }
    echo "</table></form>"; }

$connection->close();
?>