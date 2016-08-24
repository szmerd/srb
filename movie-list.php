<?php
$n=new Database();
$n->connect();
$n->db();

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
  <div class='col-md-12'>
  <a class="btn" href="reservation.php?seansid=<?php echo $id; ?>">rezerwuj</a>
  </div>
</div>

<?php } ?>