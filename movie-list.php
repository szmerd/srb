<?php

$fr_query = "SELECT * FROM filmy";

 $m= new Database();

$movies = $m->fetchAll($fr_query);

foreach ($movies as $movie) 
{
 
  $tytul = $movie['tytul'];
  $id = $movie['id'];
  $cover = $movie['cover'];
?>
<div class='col-md-3'>
  <div class='col-md-12'>
  <img style="width:100%" src="img/covers/<?php echo $cover; ?>" alt='cover'/>
  </div>
  <div class='col-md-12'>
  <span><?php echo $tytul; ?></span>
  </div>
  <div class='col-md-12'><button class='show btn-primary' id='<?php echo $id; ?>'>Seanse</button></div>
  <div class='reserv reservations_<?php echo $id; ?> col-md-12 '  style='display:none'>
 <?php 
$seans_query = "SELECT * FROM seans WHERE id_film = $id";
$seanse = $m->fetchAll($seans_query);
foreach ($seanse as $seans)
{
  $seansID = $seans['id'];
  $data = $seans['data'];
  $godzina = $seans['godzina'];
  echo '<button class="opener btn-default" id="'.$seansID.'">'.$data.'<br>'.$godzina.'</button></br>';
}
 ?>
  </div>
</div>

<?php } ?>


<div id="wrapper">

</div>

<script type="text/javascript">
$('.show').click(function(){
  $('.reservations_'+this.id).toggle();
})
$(function () {
var opt = {
    autoOpen: false,
    title: 'Rezerwacja',
    position: 'center' ,
    width : 1100,
    height : 800, 
    resizable : false,
    modal : true,
};
$('.opener').click(function() {
  
        $("#wrapper").html("<iframe width='100%' height='800' frameborder='0' scrolling='yes' marginheight='0' marginwidth='0' src='reservation.php?seansid="+this.id+"''></iframe>");  

        $("#wrapper").dialog(opt).dialog("open");

});
});
</script>