<?php
session_start();
 require('db.php');
 $what = $_GET["menu"];
 $filmid = $_GET["filmid"];
  $rezid = $_GET["rezID"];
   include('head.php');
   require('class.php');
 ?>


<body>
<div id="main">
   <?php  

if (isset($_POST['login']) and isset($_POST['password'])){
$login = $_POST['login'];
$password = $_POST['password'];
$query = "SELECT * FROM `klienci` WHERE login='$login' and password='$password' and lvl='9'";

$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
$_SESSION['login'] = $login;
}else{
echo "Błędne dane logowania lub brak dostępu.";
}
}
if (isset($_SESSION['login'])){
$login = $_SESSION['login'];
echo "Witaj, " . $login . "
";
echo "<a href='index.php?logout=true'>[wyloguj]</a>";
 if (isset($_GET['logout'])) {
    wyloguj();
  }
 
}else{
?>
    <div class="register-form">
        <?php
            if(isset($msg) & !empty($msg)){
                echo $msg;
            }
         ?>
            <form action="" method="POST">
                <p><label>Login : </label>
                <input id="login" type="text" name="login" placeholder="login" /></p>
             
                 <p><label>Hasło : </label>
                 <input id="password" type="password" name="password" placeholder="hasło" /></p>
             
                <input class="btn register" type="submit" name="submit" value="Zaloguj" />
            </form>
    </div>
<?php }  if (isset($_SESSION['login'])){ ?>

<div id="panel">
	<div class="menu">
		<ul>
		    <li>
		        <a href="?menu=">Start</a>
		    </li>
		    <li>
		        <a href="?menu=movies">Filmy</a>
		    </li>
		    <li>
		        <a href="?menu=reservations">Rezerwacje</a>
		    </li>
		</ul>
	</div>

	<div id="selected-content">
	<?php  include "admin/".$what.".php"; ?>
	<?php  if($filmid != NULL){ include "admin/edit_movie.php";} elseif($rezid != NULL){ include "admin/edit_reservation.php"; } ?>
	</div>
</div>
 
<?php }?>
    
</div>
</body>