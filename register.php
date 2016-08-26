<?php
	require('db.php');
    require('class.php');
    if (isset($_POST['login']) && isset($_POST['password'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
 
        zarejestruj($login,$password);
        
    }
    ?>
<div class="register-form">
<h1>Rejestracja</h1>
<form action="" method="POST">
    <p><label>Login : </label>
	<input id="login" type="text" name="login" placeholder="login" /></p>
	
 
     <p><label>Hasło : </label>
	 <input id="password" type="password" name="password" placeholder="hasło" /></p>
 
    <a class="btn" href="index.php">Zaloguj się</a>
    <input class="btn register" type="submit" name="submit" value="Zarejestruj się" />
    </form>
</div>