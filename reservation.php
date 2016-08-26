<?php 

session_start();
require ('db.php');
include('head.php');
if (isset($_SESSION['login'])){
$seansid = $_GET['seansid'];
$seansSQL = "SELECT filmy.tytul as tytul, data, godzina, miejsc FROM seans JOIN filmy ON filmy.id = seans.id_film WHERE  seans.id = $seansid";
$result = mysql_query($seansSQL);

while ($row = mysql_fetch_array($result))
	{
	$seansDate = $row['data'];
	$maxSeats = $row['miejsc']+1;
	$tytulF = $row['tytul'];
	echo "Wybrałeś seans: " . $row['tytul'] . " w dniu " . $seansDate . " o godzinie " . $row['godzina'];
	}

if (isset($_POST['seat_save']))
	{
	$klientID = 1;
	$seatNumber = NULL;
	for ($i = 1; $i < $maxSeats; $i++)
		{
		$chparam = "ch" . strval($i);
		if (!empty($_POST[$chparam]))
			{
			$seats = "INSERT INTO rezerwacje(id_seans, numer, id_klient, PNR) VALUES ('" . $seansid . "', '" . intval($i) . "', '" . $klientID . "', '" . $seansDate . "-" . intval($i) . "')";
			$results = mysql_query($seats);
			if (!$results)
				{
				die("Błąd podczas rezerwacji miejsc: <br />" . mysql_error());
				}

			$seatNumber = $seatNumber . ", " . "$i";

			}
		}
		echo "<br>Wybrane miejsca zostały zarezerwowane: ". $seatNumber;

		include('pdf.php');

	}
else {


			
?>

<form name="seat_save" action="<?php $_PHP_SELF ?>" method="POST" onsubmit="return validateCheckBox();">
						<ul class="thumbnails">
						<?php
							$date = strip_tags( utf8_decode( $seansDate ) );
							$query = "select * from rezerwacje WHERE id_seans = $seansid";
							$result = mysql_query($query);
							if ( mysql_num_rows($result) == 0 )
							{
								for($i=1; $i<$maxSeats; $i++)
								{
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Available'>";
											echo "<img src='img/available.png' alt='Available Seat'/>";
											echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='ch".$i."'/>M".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";								
								}
							}
							else
							{
								$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
								while($row = mysql_fetch_array($result))
								{
									$pnr = explode("-", $row['PNR']);
									$pnr[3] = intval($pnr[3]) - 1;
									$seats[$pnr[3]] = 1;
								}
								for($i=1; $i<$maxSeats; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";
												echo "<img src='img/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."' disabled/>M".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Available'>";
												echo "<img src='img/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."'/>M".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
								}									
								
							}
						?>
						</ul>
						<center>
							
							<button type="submit" name="seat_save" class="btn btn-success">
							 Rezerwuj
							</button>
							<button type="reset" class="btn">
								Wyczyść
							</button>
							
						</center>
					</form>

					<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Proszę wybrać przynajmniej 1 miejsce.');
				return false;
			}
		</script>

<?php }} else{
	include('login.php');
}

?>