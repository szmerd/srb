<?php
require('../db.php');
 if(isset($_POST['update'])) {
    $tytul = $_POST['tytul'];
    $rezyser = $_POST['rezyser'];
    $gatunek = $_POST['gatunekID'];
    $coverName = $_FILES["fileToUpload"]["name"];
    $update = "INSERT INTO filmy  (tytul, rezyser, gatunek, cover) VALUES ('$tytul','$rezyser','$gatunek', '$coverName')" ;
            mysql_select_db('test_db');
            $retval = mysql_query( $update, $connection );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Pozycja została zaktualizowana\n";

    $target_dir = "../img/cover/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["update"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
}
else{
   

	echo "<form name='update' method='post' action='$_PHP_SELF' enctype='multipart/form-data'>";
     echo "<table>
      <tr>
        <th>Tytul</th>
        <th>Reżyser</th>
        <th>Gatunek</th>
        <th>Edycja</th>
      </tr>";
    ?>

                     
                        <td><input name = "tytul" type = "text" 
                           id = "tytul" ></td>
                     
                        <td><input name = "rezyser" type = "text" 
                           id = "rezyser" "></td>
                    
                         <td><input name = "gatunekID" type = "text" 
                           id = "gatunekID" ></td>

                         <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                        
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>


    <?php 
    echo "</table></form>"; }

$connection->close();
?>