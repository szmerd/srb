<?php
$sql = "SELECT filmy.id as filmID, tytul, rezyser, gatunek.nazwa as gatunek FROM filmy JOIN gatunek ON filmy.gatunek = gatunek.id";
$result = mysql_query($sql);

	echo "<table>
  <tr>
    <th>Tytul</th>
    <th>Reżyser</th>
    <th>Gatunek</th>
    <th><a  class='opener btn'>Dodaj film</a></th>
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

 ?>

<div id="wrapper">

</div>

<script type="text/javascript">
$(function () {
var opt = {
    autoOpen: false,
    title: 'Dodaj film',
    position: 'center' ,
    width : 800,
    height : 200, 
    resizable : false,
    modal : true,
};
$('.opener').click(function() {
  
        $("#wrapper").html("<iframe width='100%' height='200px' frameborder='0' scrolling='yes' marginheight='0' marginwidth='0' src='admin/add_movie.php''></iframe>");  

        $("#wrapper").dialog(opt).dialog("open");

});
});
</script>