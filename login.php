<?php  

if (isset($_POST['login']) and isset($_POST['password'])){
$login = $_POST['login'];
$password = $_POST['password'];
$query = "SELECT * FROM `klienci` WHERE login='$login' and password='$password'";

$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
$_SESSION['login'] = $login;
}else{
echo "Błędne dane logowania.";
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
             
                <a class="btn" href="register.php">Rejestracja</a>
                <input class="btn register" type="submit" name="submit" value="Zaloguj" />
            </form>
    </div>
<?php } ?>